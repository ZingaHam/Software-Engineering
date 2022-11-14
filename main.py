# main python file for SWE project
import os
from flask import Flask, flash, request, redirect, url_for
from werkzeug.utils import secure_filename

app = Flask(__name__)

index_html = open("index.html", "r")
upload_html = open("upload.html", "r")

@app.route("/")
def hello_world():
	return index_html.read()
    
@app.route('/upload')
def upload():
    return upload_html.read()