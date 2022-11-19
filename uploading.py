import boto3, botocore
import os
from aws_connect import login_test
from flask import Flask, flash, request, redirect, url_for
from werkzeug.utils import secure_filename

app.config['S3_BUCKET'] = "amplify-softwareengineering-dev-190948-deployment"
app.config['S3_LOCATION'] = 'http://{}.s3.amazonaws.com/'.format(app.config['S3_BUCKET'])

BUCKET = 'amplify-softwareengineering-dev-190948-deployment'

s3 = boto3.client(
   "s3",
   aws_access_key_id=app.config['S3_KEY'],
   aws_secret_access_key=app.config['S3_SECRET']
)

upload_html = open("upload.html", "r")
s_upload_html = open("successful_upload.html", "r")

# folder to upload files to and accepted file extentions
ALLOWED_EXTENSIONS = {'txt', 'png', 'jpg', 'jpeg'}

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
            print("Uploading S3 object with SSE-KMS")
            s3.put_object(Bucket=BUCKET,
              Key='encrypt-key',
              Body=file,
              ServerSideEncryption='aws:kms')
            print("Done")
            return redirect(url_for('download_file', name=filename))
    return upload_html.read()
    
