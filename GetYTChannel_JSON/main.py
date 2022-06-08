# -*- coding: utf-8 -*-

# Sample Python code for youtube.search.list
# See instructions for running these code samples locally:
# https://developers.google.com/explorer-help/code-samples#python

#Documents:https://developers.google.com/youtube/v3/docs/search/list#usage


import os
import json
import googleapiclient.discovery

def main():
    # Disable OAuthlib's HTTPS verification when running locally.
    # *DO NOT* leave this option enabled in production.
    os.environ["OAUTHLIB_INSECURE_TRANSPORT"] = "1"

    api_service_name = "youtube"
    api_version = "v3"
    DEVELOPER_KEY = "APIKEY"

    youtube = googleapiclient.discovery.build(
        api_service_name, api_version, developerKey = DEVELOPER_KEY)

    request = youtube.search().list(
        part="snippet",
        channelId="CHANNEL_ID",
        maxResults=50,
        order="date"
    )
    response = request.execute()

    print(response)
    with open("response.json", mode="w", encoding="utf-8") as f:
        json.dump(response, f, ensure_ascii=False, indent=2)

if __name__ == "__main__":
    main()