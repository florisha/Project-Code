
from pymongo import MongoClient

# pprint library is used to make the output look more pretty

from pprint import pprint
import math

def checkFor(d, s):
	temp=""
	for k,v in d.items():
		if(k == s):
			temp+=v
		elif(type(v)==list):
			for i in range(0,len(v)):
				if(type(v[i])==dict):
					temp+=checkFor(v[i],s)
		elif(type(v)==dict):
			temp+=checkFor(v,s)
	# print("\n"+temp+"\n")
	return temp

# connect to MongoDB, change the << MONGODB URL >> to reflect your own connection string

client = MongoClient('mongodb://u24:azeti6ex@127.0.0.1:27017/u24')
db=client.u24

x=db.articles.find()
temp = []
t={}
a=[]
db.drop_collection('Articles')
			
for document in x:
	# print(str(document))
	if("pages" not in document or "author" not in document or "title" not in document or "volume" not in document or "year" not in document or "journal" not in document):
		continue
	
	t = {}
	temp=[]
	if(type(document['author'])==list):
		
		for x in range(0,len(document['author'])):
			try:
				temp.append(document['author'][x]['ftext'])
			except:
				break

	else:
		temp.append(document['author']['ftext'])
	
	t['pages']=(document['pages']['ftext'])

	
	t['volume']=(document['volume']['ftext'])
	t['journal']=(document['journal']['ftext'])
	t['year']=(document['year']['ftext'])
	try:
		t['title']=(document['title']['ftext'])
	except KeyError as e:
		# print(e)
		#print("Exception in title: "+str(document['title']))
		t['title']=checkFor(document['title'],'ftail')
		#print(t['title'])
	t['author']=temp
	db.Articles.insert(t)

# remove comment to drop collection	
	#client['u30'].drop_collection('articles')
	

	

	
	
	
	
