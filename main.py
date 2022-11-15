# main python file for SWE project
import os
from flask import Flask, flash, request, redirect, url_for
from werkzeug.utils import secure_filename

# folder to upload files to and accepted file extentions
UPLOAD_FOLDER = 'https://drive.google.com/drive/folders/1A602y-LL2vKAKEy4h6F5MeRR4b8cbQdJ?usp=sharing'
ALLOWED_EXTENSIONS = {'txt', 'png', 'jpg', 'jpeg'}

# name of the app
app = Flask(__name__)
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

index_html = open("index.html", "r")
upload_html = open("upload.html", "r")
s_upload_html = open("successful_upload.html", "r")

# trying to upload to the a Google drive folder for confirmation it works 

# opens the index page at the url with just a backslash added
@app.route("/")
def hello_world():
	return index_html.read()
    
# opens the upload page at the url with '/upload' added    
@app.route('/upload', methods=['GET', 'POST'])
def upload_files():    
    if request.method == 'POST':
        # check if the post request has the file part
        if 'file' not in request.files:
            # print("option 1")
            flash('No file part')
            return redirect(request.url)
        file = request.files['file']
        # If the user does not select a file, the browser submits an
        # empty file without a filename.
        if file.filename == '':
            # print("option 2")
            flash('No selected file')
            return redirect(request.url)
        if file and allowed_file(file.filename):
            # print("option 3")
            filename = secure_filename(file.filename)
            file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
            return redirect(url_for('download_file', name=filename))
    return upload_html.read()
    
    