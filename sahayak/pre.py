import pandas as pd
import numpy as np 
import matplotlib.pyplot as plt
#%matplotlib inline
import seaborn as sns
from matplotlib.pylab import rcParams
import time
pd.set_option('display.max_columns',None)
pd.set_option('display.max_rows',None)
pd.set_option('display.float_format', '{:4f}'.format)

import statsmodels.api as sm
from statsmodels.graphics.tsaplots import plot_acf, plot_pacf
from statsmodels.tsa.statespace.sarimax import SARIMAX
from statsmodels.tsa.stattools import adfuller
from statsmodels.tsa.seasonal import seasonal_decompose as sd
from sklearn.metrics import mean_squared_error
from sklearn.linear_model import LassoLarsCV

import warnings
warnings.filterwarnings('ignore')
warnings.simplefilter("ignore")

import itertools
import pandas as pd
import numpy as np

data = pd.read_csv('diseases.csv')
data.head()

diseaseData = data.copy()
diseaseData['date'] = diseaseData['date'].str.replace("/","-")
diseaseData['date'] = pd.to_datetime(data['date'])
diseaseData.sort_values(by=['date','disease'],inplace=True)
diseaseData.head()

tmp = diseaseData.groupby(['date','disease'],as_index=False)['patient_count'].mean()
tmp.head()

tmp.set_index('date',inplace=True)

tmp = tmp.groupby('disease',as_index=False).resample('MS').mean()
tmp.head()

tmp = tmp.reset_index(level=0, drop=True)
tmp.isnull().sum()

tmp['disease'] = tmp['disease'].astype(int)

diseaseName = ['Maleria','Dangue','Typhoid','Viral Fever']
diseaseList = [1,2,3,4]
for i,d in zip(diseaseList,diseaseName):
    temp = tmp[tmp.disease == i]
    temp['patient_count'].plot(figsize = (15,8), label=d)


plt.legend(bbox_to_anchor=(1.04,1), loc='upper left', ncol=2)
plt.xlabel("Month", fontsize = 16)
plt.ylabel("Average Patient Confirmed")
plt.title('Patients in India', fontsize = 20);

mon_avg = tmp.groupby('date')['patient_count'].mean()
mon_avg = mon_avg.to_frame()
mon_avg = mon_avg.asfreq(freq ='MS')
mon_avg

pd.infer_freq(tmp)


decomposition = sm.tsa.seasonal_decompose(mon_avg, period=6 , model='additive')

#Gather the trend, seasonality, and residuals
trend = decomposition.trend
seasonal = decomposition.seasonal
residual = decomposition.resid

# Plot gathered statistics
plt.figure(figsize=(12,8))
plt.subplot(411)
plt.plot(tmp, label='Original', color='blue')
plt.legend(loc='best')
plt.subplot(412)
plt.plot(trend, label='Trend', color='blue')
plt.legend(loc='best')
plt.subplot(413)
plt.plot(seasonal,label='Seasonality', color='blue')
plt.legend(loc='best')
plt.subplot(414)
plt.plot(residual, label='Residuals', color='blue')
plt.legend(loc='best')
plt.tight_layout()

def stationarity_check(TS):
    from statsmodels.tsa.stattools import adfuller
    
    roll_mean = TS.rolling(window=2, center=False).mean()
    roll_std = TS.rolling(window=2, center=False).std()
    
    # Perform the Dickey Fuller test
    dftest = adfuller(TS) 
    
    # Plot rolling statistics:
    fig = plt.figure(figsize=(12,6))
    orig = plt.plot(TS, color='blue',label='Original')
    mean = plt.plot(roll_mean, color='red', label='Rolling Mean')
    std = plt.plot(roll_std, color='black', label = 'Rolling Std')
    plt.legend(loc='best')
    plt.title('Rolling Mean & Standard Deviation')
    plt.show(block=False)
    
    # Print Dickey-Fuller test results
    print('Results of Dickey-Fuller Test: \n')

    dfoutput = pd.Series(dftest[0:4], index=['Test Statistic', 'p-value', 
                                             '#Lags Used', 'Number of Observations Used'])
    for key, value in dftest[4].items():
        dfoutput['Critical Value (%s)'%key] = value
    print(dfoutput)
    
    return None
    
disease_dfs = []
lst = np.array([1,2,3,4])
for x in lst:
    disease_dfs.append(pd.DataFrame(tmp[tmp['disease']==x][['patient_count']].copy()))


for df,name in zip(disease_dfs, lst):
    df.plot()
    plt.title(name)
    plt.show()
    
# Define the p, d and q parameters to take any value between 0 and 2
p = d = q = range(0,2)
# Generate all different combinations of p, d and q triplets
pdq = list(itertools.product(p,d,q))
# Generate all different combinations of seasonal p, d and q triplets
pdqs = [(x[0], x[1], x[2], 12) for x in list(itertools.product(p, d, q))]

ans = []

for df, name in zip(disease_dfs, diseaseName):
    for para1 in pdq:
        for para2 in pdqs:
            try:
                mod = sm.tsa.statespace.SARIMAX(df,
                                                order = para1,
                                                seasonal_order = para2,
                                                enforce_stationarity = True,
                                                enforce_invertibility = False)
                output = mod.fit()
                ans.append([name, para1, para2, output.aic])
                print('Result for {}'.format(name) + ' ARIMA {} x {}12 : AIC Calculated = {}'.format(para1, para2, output.aic))
            except:
                continue
                
                
                
result = pd.DataFrame(ans, columns = ['name','pdq','pdqs','AIC'])

best_para = result.loc[result.groupby("name")["AIC"].idxmin()]
best_para

tmp['patient_count'].mean()

disease_dfs[0]

for name, pdq, pdqs, df in zip(best_para['name'], best_para['pdq'], best_para['pdqs'], disease_dfs):
    
    ARIMA_MODEL = sm.tsa.SARIMAX(df, 
                           order = pdq,
                           seasonal_order = pdqs,
                           freq = 'MS',
                           enforce_stationarity = True,
                           enforce_invertibility = False)
    
    output = ARIMA_MODEL.fit()
    print('SARIMA Model Result for {}'.format(name))
    print(output.summary().tables[1])
    
    
summary_table = pd.DataFrame()
Disease = []
MSE_Value = []
models = []
for name, pdq, pdqs, df in zip(best_para['name'], best_para['pdq'], best_para['pdqs'], disease_dfs):
    ARIMA_MODEL = sm.tsa.SARIMAX(df,
                                 order = pdq,
                                 seasonal_order = pdqs,
                                 freq = 'MS',
                                 enforce_stationarity = True,
                                 enforce_invertibility = False)
                                
    output = ARIMA_MODEL.fit()
    models.append(output)

    pred_dynamic = output.get_prediction(start='2019-02-01', dynamic = True, full_results = True)
    pred_dynamic_conf = pred_dynamic.conf_int()
    d_forecasted = pred_dynamic.predicted_mean
    d_truth = df['2019-02-01':]['patient_count']
    
    ax = df.plot(label='observed', figsize=(10, 8))
    pred_dynamic.predicted_mean.plot(label='Dynamic Forecast', ax=ax)

    ax.fill_between(pred_dynamic_conf.index,
                    pred_dynamic_conf.iloc[:, 0],
                    pred_dynamic_conf.iloc[:, 1], color='g', alpha=.3)


    ax.set_xlabel('Time')
    ax.set_ylabel('Average Patient Count')

    plt.legend()
    plt.show()

    sqrt_mse = np.sqrt(((d_forecasted - d_truth)**2).mean())
    mape = np.mean(np.abs(d_forecasted - d_truth)/np.abs(d_truth))
    print('The Mean Squared Error of our forecasts is {}'.format(round(sqrt_mse, 2))) 
    print('MAPE : {}'.format(round(mape,2)))
    
    Disease.append(name)
    MSE_Value.append(sqrt_mse)
    
summary_table['Disease'] = Disease
summary_table['Sqrt_MSE'] = MSE_Value


forecast_table = pd.DataFrame()
current = []
forecast_1mon = []
forecast_2mon = []
forecast_3mon = []
forecast_4mon = []
forecast_5mon = []
forecast_6mon = []
forecast_7mon = []
forecast_8mon = []
forecast_9mon = []
forecast_10mon = []
forecast_11mon = []
forecast_12mon = []

predicted_data = []

for disease, output, df in zip(Disease, models, disease_dfs):
    pred = []
    pred_conf = [] 
    forecast = []
    for i in range(1,13):
        pred = output.get_forecast(steps = i)      
        forecast.append(pred.predicted_mean.to_numpy()[-1])
    
    current.append(df.loc['2020-12-01']['patient_count'])
    forecast_1mon.append(forecast[0])
    forecast_2mon.append(forecast[1])
    forecast_3mon.append(forecast[2])
    forecast_4mon.append(forecast[3])
    forecast_5mon.append(forecast[4])
    forecast_6mon.append(forecast[5])
    forecast_7mon.append(forecast[6])
    forecast_8mon.append(forecast[7])
    forecast_9mon.append(forecast[8])
    forecast_10mon.append(forecast[9])
    forecast_11mon.append(forecast[10])
    forecast_12mon.append(forecast[11])
    
forecast_table['Disease'] = Disease
forecast_table['Current Value'] = current
forecast_table['1 Month'] = forecast_1mon
forecast_table['2 Months'] = forecast_2mon
forecast_table['3 Months'] = forecast_3mon
forecast_table['4 Months'] = forecast_4mon
forecast_table['5 Months'] = forecast_5mon
forecast_table['6 Months'] = forecast_6mon
forecast_table['7 Months'] = forecast_7mon
forecast_table['8 Months'] = forecast_8mon
forecast_table['9 Months'] = forecast_9mon
forecast_table['10 Months'] = forecast_10mon
forecast_table['11 Months'] = forecast_11mon
forecast_table['12 Months'] = forecast_12mon

forecast_table

models

for m,z in zip(models,Disease):
    m.save(str(z)+'.pkl')
    
"""import pickle
from datetime import date

import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="health",
    port=3306
)

mycursor = mydb.cursor()

emptyQuery = "TRUNCATE TABLE prediction;"
mycursor.execute(emptyQuery)


diseases = ['Maleria','Dangue','Typhoid','Viral Fever']

data = {}

for d in diseases:
    fileName = d + '.pkl'
    with open(fileName, 'rb') as file:
        model = pickle.load(file)
    
    data[d] = {}
    for i in range(1,13):
        pred = model.get_forecast(steps = i)
        forecast = pred.predicted_mean.to_numpy()[-1]
        data[d][i] = int(forecast)
        
for month in range(1,13):
    query = "INSERT INTO prediction (location, malaria, dangue, typhoid, viral_fever) VALUES (%s, %s, %s, %s, %s)"
    val = (0, data[diseases[0]][month], data[diseases[1]][month], data[diseases[2]][month], data[diseases[3]][month])
    mycursor.execute(query, val)

mydb.commit()
"""