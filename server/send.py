import sys
from urllib2 import *
import json
import urllib

MY_API_KEY = "API_KEY"

messageTitle = sys.argv[1]
messageBody = sys.argv[2]

data={
    "to": "/topics/test_topic",
    "notification": {
        "body": messageBody,
        "title": messageTitle,
        "icon": "ic_feedback_black_48dp"
    }
}

dataAsJSON = json.dumps(data)

request = Request(
    "https://gcm-http.googleapis.com/gcm/send",
    dataAsJSON,
    { "Authorization" : "key="+MY_API_KEY,
      "Content-type" : "application/json"
    }
)

print urlopen(request).read()
