MARIN TRAFFIC API FOR INTERVIEW'S TEST

HOW DOES IT WORK:

    1) PUT requests on http://mag234.p72.srv206.netsteps.net/rest/V1/ship_positions/filter
    2) Token for Api user "marin traffic": gw589ndpnnuljx04u9cg697jjlyqqjkt
    3) Headers for the request should be 
        Content-Type: application/json
        Authorization: Bearer gw589ndpnnuljx04u9cg697jjlyqqjkt
    4) Body of the request includes multiple filters. e.g:
        ex.1 
        {
        	"filters": [
        		{
        			"from_timestamp": "2013-07-01 05:40:00",
        			"to_timestamp"  : "2013-07-01 08:56:51"
        		}
        		
        	]
        }
        
        ex.2
        {
        	"filters": [
        		{
        			"mmsi": 247039300
        		}
        		
        	]
        }
        
        ex.3
        {
        	"filters": [
        		{
        			"mmsi": 247039300
        		},
        		{
        			"mmsi": 311486000
        		}
        		
        	]
        }
        
        ex.4
        {
        	"filters": [
        		{
        			"mmsi": 311486000,
        			"min_lat": "38.20",
        			"max_lat": "38.23"
        		},
        		{
        			"max_lon": "11.35080"
        		}
        		
        	]
        }
        
        ex.5 
        {
        	"filters": [
        		{
        			"from_timestamp": "2013-07-01 18:41:00"
        		}
        		
        	]
        }
        
        ex.6
        {
        	"filters": [
        		{
        			"from_timestamp": "2013-07-01 10:23:00",
        			"to_timestamp": "2013-07-01 18:23:00"
        		}
        		
        	]
        }
        
        And so on...

API CALLS have been tested through postman.
I have created for you a second API user with the following creds:
    name: testuser, token: 67hii150tfu1o7wzapyf6zvbl858l9kc 


You can check the requested logs by logging in the Magento2 admin:
    http://mag234.p72.srv206.netsteps.net/admin/
    user: marinTraffic, pass: asdf1234!
Now Visit on the left of the page, the menu->API WATCHER->Web Api Logger 



*NOTICE: DUE TO LACK OF TIME THERE HAS NOT BEEN IMPLEMENTED TESTS AND A SECOND SUPPORTED FORMAT (only application/json
 is accepted) OF THE API.
I COULD MANAGE TO FINISH IT IF I COULD BE GIVEN MORE FREE TIME IN THE NEXT WEEKEND. 


        
        

