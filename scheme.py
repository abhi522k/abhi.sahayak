import pandas as pd
import numpy as np
import mysql.connector

from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity
###### helper functions. Use them when needed #######
def get_title_from_index(index):
	return df[df.index == index]["scheme_name"].values[0]

def get_index_from_title(scheme_name):
	return df[df.scheme_name == scheme_name]["index"].values[0]

def get_schemedesc_from_index(index):
    return df[df.index == index]["scheme_description"].values[0]
##################################################

##connecting to a database
con = mysql.connector.connect(
    host = "localhost",
    user = "root",
    password = "",
    database = "healthcare",
    port =3306
)

df = pd.read_sql("SELECT * FROM scheme_table",con)
#print(df.columns)
 

##Step 1: Read CSV File
##df = pd.read_csv("abhi.csv")
##print(df.columns)


##Step 2: Select Features
features = ['ration_card','health_card','income_certificate','pregnant','opd','voter_card','rural_area','pan_card','urban_area','satbara_utara']

##Step 3: Create a column in DF which combines all selected features
    
def combine_feature(row):
        return row['ration_card'] +" "+row['health_card'] +" "+row['income_certificate'] +" "+row['pregnant']+" "+row['opd']+" "+row['voter_card']+" "+row['rural_area']+" "+row['pan_card']+" "+row['urban_area']+" "+row['satbara_utara']
   
        
df["combined_fearures"] = df.apply(combine_feature,axis=1)

#print("combined features:",df["combined_fearures"].head(10))

##Step 4: Create count matrix from this new combined column
cv = CountVectorizer()

count_matrix = cv.fit_transform(df["combined_fearures"])
##Step 5: Compute the Cosine Similarity based on the count_matrix
cosine_sim = cosine_similarity(count_matrix)
#print(cosine_sim)
scheme_user_likes = get_title_from_index([0])

## Step 6: Get index of this scheme from its title
scheme_index = get_index_from_title(scheme_user_likes)

similar_scheme = list(enumerate(cosine_sim[scheme_index]))

## Step 7: Get a list of similar scheme in descending order of similarity score
sorted_similar_scheme = sorted(similar_scheme,key=lambda x:x[1],reverse=True)

## Step 8: Print titles of first 50 scheme
mycursor = con.cursor()
mycursor.execute("DELETE FROM rescheme")
  
i=0
for scheme in sorted_similar_scheme:
    if get_title_from_index(scheme[0])!=scheme_user_likes:
        #print(get_title_from_index(scheme[0]),get_schemedesc_from_index(scheme[0]))
        ab=get_title_from_index(scheme[0])
        cd=get_schemedesc_from_index(scheme[0])
        sql = "INSERT INTO rescheme (schemeid, schemename, schemedesc) VALUES (%s, %s, %s)"
        val = (i, ab, cd)
        mycursor.execute(sql, val)
        i=i+1
        if i>20:
            break

con.commit()
print(mycursor.rowcount, "record inserted.")
con.close()