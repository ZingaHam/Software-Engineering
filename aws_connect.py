# python file for connecting to AWS servers
# queries AWS Amplify studio for user information
# using the API method for regular users and the IAM method for admin
import asyncio
import os
import sys
from urllib.parse import urlparse

from gql import Client, gql
from gql.transport.appsync_auth import AppSyncApiKeyAuthentication
from gql.transport.appsync_websockets import AppSyncWebsocketsTransport

def login_test():
    try:
        url = os.environ.get("AWS_GRAPHQL_API_ENDPOINT")
        api_key = os.environ.get("AWS_GRAPHQL_API_KEY")

    except:
        url, api_key = "Not Found"
        
    return ("URL: %s \nAPI Key: %s"%(url, api_key))