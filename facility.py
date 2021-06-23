from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity
###### helper functions. Use them when needed #######
def get_title_from_index(index):
	return df[df.index == index]["facility_name"].values[0]

def get_index_from_title(facility_name):
	return df[df.facility_name == facility_name]["index"].values[0]

def get_facilitydesc_from_index(index):
    return df[df.index == index]["facility_description"].values[0]
##################################################

##connecting to a database
con = mysql.connector.connect(
    host = "localhost",
    user = "root",
    password = "",
    database = "healthcare",
    port =3306
)

df = pd.read_sql("SELECT * FROM facility_table",con)
#print(df.columns)
 

##Step 1: Read CSV File
##df = pd.read_csv("abhi.csv")
##print(df.columns)


##Step 2: Select Features
features = ['ration_card','health_card','satbara_utara','income_certificate','pregnant','opd','voter_card','rural_area','pan_card','urban_area']

##Step 3: Create a column in DF which combines all selected features
    
def combine_feature(row):
        return row['ration_card'] +" "+row['health_card']+" "+row['satbara_utara'] +" "+row['income_certificate'] +" "+row['pregnant']+" "+row['opd']+" "+row['voter_card']+" "+row['rural_area']+" "+row['pan_card']+" "+row['urban_area']
   
        
df["combined_fearures"] = df.apply(combine_feature,axis=1)

#print("combined features:",df["combined_fearures"].head(10))

##Step 4: Create count matrix from this new combined column
cv = CountVectorizer()
count_matrix = cv.fit_transform(df["combined_fearures"])

##Step 5: Compute the Cosine Similarity based on the count_matrix
cosine_sim = cosine_similarity(count_matrix)
#print(cosine_sim)
facility_user_likes = get_title_from_index([0])

## Step 6: Get index of this scheme from its title
facility_index = get_index_from_title(facility_user_likes)

similar_scheme = list(enumerate(cosine_sim[facility_index]))

## Step 7: Get a list of similar scheme in descending order of similarity score
sorted_similar_facility = sorted(similar_scheme,key=lambda x:x[1],reverse=True)

## Step 8: Print titles of first 50 scheme
mycursor = con.cursor()
mycursor.execute("DELETE FROM refacility")
  
i=0
for facility in sorted_similar_facility:
    if get_title_from_index(facility[0])!=facility_user_likes:
        #print(get_title_from_index(facility[0]),get_facilitydesc_from_index(facility[0]))
        ab=get_title_from_index(facility[0])
        cd=get_facilitydesc_from_index(facility[0])
        sql = "INSERT INTO refacility (facilityid, facilityname, facilitydesc) VALUES (%s, %s, %s)"
        val = (i, ab, cd)
        mycursor.execute(sql, val)
        i=i+1
        if i>20:
            break

con.commit()
print(mycursor.rowcount, "record inserted.")
con.close()
