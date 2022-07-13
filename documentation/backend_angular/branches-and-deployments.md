[Home](index.md)

# Online Calendar: Table of Contents

We will cover entire section of Online Calendar and it's function step by step.
- [What is agentmx & How it works?](agentmx-Work-Flow.md)
- [Branches & Deployments?](branches-and-deployments.md)
- [How Many Database Tables Used?](mx-Database.md)
- [How you will find folder and files structure?](mx-Files.md)
- [Linking with CallCid](linking-with-Functions.md)

=============
## Branches:

AgentMx Admin :

```Swift
 https://local.svn.beanstalkapp.com/chat_angular-latest/trunk

```

NodeJs FrontEnd :

```Swift
https://local.svn.beanstalkapp.com/chat_angular-latest/branches/node_chat_latest
```


<hr/>

## Deployments:

Angular Admin :
    
```Swift
LIVE_agentmx.com_EUAWS(frontend angular) 
```

NodeJS Frontend:

```Swift
Live_AgentMX_Node (wizolo.com)
```

<hr/>

## URLs:

Live:

```Swift
wizolo.com:8282/

```

Development:

```Swift
wizolo.com:8585/

```
Local:

```Swift
localhost:8383/

```


__NOTE:__ IN Local Please Try to Keep same URL as Projects are interlinked and URLs are defined in other Projects Configurations.



<hr/>

## Node Development Server :

We have created Different Environment for staging/development. It is on the same Server but can be accessed by the different User:

```Swift
ssh -i Node_Server.pem nodelt@34.197.157.13
```

When You commit code to `https://local.svn.beanstalkapp.com/chat_angular-latest/branches/node_chat_latest`, It is automatically deployed to the dev enviroment. You just have to wait for few seconds and restart the server with `PM2` Commands. Server Team can help you better with commands


## Node Production Server :

You can Access Production Server with following SSH command :

```Swift
ssh -i Node_Server.pem ubuntu@34.197.157.13
```

After you Deploy the code, You will have to login to Server Shell and restart Server with `pm2` commands, then changes will start reflecting on live.












      