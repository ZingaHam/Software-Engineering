# main python file for SWE project
import os
import uploading
from aws_connect import login_test
from flask import Flask, flash, request, redirect, url_for
from werkzeug.utils import secure_filename



# name of the app
app = Flask(__name__)
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

index_html = open("index.html", "r")


# login page
#@app.route("/login")
#def login_page():
#    results=login_test()
#    return "<p>%s<p>"%results
    

# opens the index page at the url with just a backslash added
@app.route("/")
def home_page():
	return index_html.read()
   
   

    
    