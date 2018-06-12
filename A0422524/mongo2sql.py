import numpy as np
from pymongo import MongoClient
import pandas as pd
import time
import timeit

client = MongoClient('mongodb://u24:azeti6ex@127.0.0.1:27017/u24')
db=client.u24
collection=db.Articles.find()
collection2 = db.Author.find()

df=pd.DataFrame(list(collection))
other_authors = pd.DataFrame(list(collection2))
other_mags = ["Theor. Comput. Sci.",
"Linguistics and Philosophy",
"Lecture Notes in Computer Science"]

x = df.values[:,1:]
authors = pd.DataFrame(columns=["authId","lname","fname","email"])
authors.set_index('authId')
art_auth = pd.DataFrame(columns=["authId","artId"])
art_auth.set_index('authId')
articles = pd.DataFrame(columns=["artId","title","page","mvid"])
articles.set_index('artId')
volumes = pd.DataFrame(columns=["mvid","vnum","vyear"])
volumes.set_index('mvid')
contains = pd.DataFrame(columns=["mvid","mid"])
contains.set_index('mvid')
magazines = pd.DataFrame(columns=["mid","name"])
magazines.set_index('mid')

authId = 1
artId = 1
mvid = 1
mid = 0

lnames = []
fnames = []
emails = []
authIds = []
artIds = []
titles = []
pages = []
mvids = []
mids = []
vnums = []
vyears = []
mnames = []

temp_names = {}
start_time = time.time()

for i in range(0,len(x)):
    author = x[i][0]
    article = x[i][3].replace('\n','').replace('"','').replace('.','')
    mag_name = x[i][1]
    vnum = x[i][4]
    vyear = x[i][5]
    pgno = x[i][2]

    artId+=1

    if(mag_name not in temp_names):
        # for name in temp_names:
        #     print(len(temp_names[name]))
        # print("For magazine "+mag_name)
        # print(temp_names)
        mid+=1
        mvid+=1
        # last_name = mag_name
        temp_names[mag_name] = [vnum]
    elif(vnum not in temp_names[mag_name]):
        # print(mag_name not in temp_names)
        # print(vnum)
        # print(temp_names[mag_name])
        temp_names[mag_name].append(vnum)
        mvid += 1

    for a in author:
        split = a.rsplit(' ',1)
        fname = split[0]
        try:
            lname = split[1]
            email = fname+"."+lname+"@gmail.com"
        except:
            lname = ""
            email = fname+"@gmail.com"
        lnames.append(lname)
        fnames.append(fname)
        emails.append(email)
        authIds.append(authId)
        authId+=1

        artIds.append(artId)
        titles.append(article)
        pages.append(pgno)
        mvids.append(mvid)

        mids.append(mid)
        vnums.append(vnum)
        vyears.append(vyear)
        mnames.append(mag_name)    

authors['authId'],authors['lname'],authors['fname'],authors['email'] = authIds,lnames,fnames,emails
art_auth['authId'],art_auth['artId'] = authIds,artIds
articles['artId'],articles['title'],articles['page'],articles['mvid'] = artIds,titles,pages,mvids
volumes['mvid'],volumes['vnum'],volumes['vyear'],volumes['mid'] = mvids,vnums,vyears,mids
contains['mid'],contains['mvid'],contains['vyear'] = mids,mvids,vyears
magazines['mid'],magazines['name'] = mids,mnames
# print(other_authors[['lname','fname','email']])

authors = authors.append(other_authors[['lname','fname','email']],ignore_index=True)
authors = authors.drop_duplicates(subset={'lname','fname'})
authors['authId'] = authors.index
articles = articles.drop_duplicates(subset={'title','page'})
art_auth = art_auth[art_auth['artId'].isin(articles['artId'])].dropna(axis=0)
art_auth = art_auth[art_auth['authId'].isin(authors['authId'])].dropna(axis=0)

# print(authors[:70][['authId','lname','fname','email']])
# print(len(authors))
# print(art_auth[-20:])
# print(len(art_auth))

# print(articles[-20:])
# print(len(articles))

magazines = magazines.drop_duplicates(subset={'name'})
for x in other_mags:
    magazines.loc[magazines.shape[0]+1] = [magazines.shape[0]+1,x]
print(magazines)
volumes = volumes.drop_duplicates(subset={'mvid','mid','vyear'})
contains = contains.drop_duplicates(subset={'mvid','mid','vyear'})

# print(contains[:])
# print(len(contains))
# print(volumes[-5:])
# print(len(volumes))
# print(magazines[-5:])
# print(len(magazines))

magazines.to_csv("magazines.csv",index=False,encoding='utf-8')
volumes.to_csv("volumes.csv",index=False,encoding='utf-8')
contains.to_csv("contains.csv",index=False,encoding='utf-8')
articles.to_csv("articles.csv",index=False,encoding='utf-8')
art_auth.to_csv("art_auth.csv",index=False,encoding='utf-8')
authors[['authId','lname','fname','email']].to_csv("authors.csv",index=False,encoding='utf-8')

print("TIME of Execution is "+str(time.time()-start_time))


