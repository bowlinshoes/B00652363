      //function to filter collection to display topics
      function getCollectionDetails(str) 
      {
        if (str == "") {
          document.getElementById("collectionDetails").innerHTML = "";
          return;
        }
        if (window.XMLHttpRequest) {
          xmlHttp = new XMLHttpRequest();
        }
          xmlHttp.onreadystatechange = function () {
          if (xmlHttp.readyState == 4) {
                  
            document.getElementById("collectionDetails").innerHTML = xmlHttp.responseText;
            }
          }
            xmlHttp.open("GET", "collectionfilter.php?collectionID=" + str, true);
            xmlHttp.send();
      }

      //getCollectionDetails('-1');


      //function to filter collection to display topics
      function getTopicDetails(str) 
      {
        if (str == "") {
          document.getElementById("topicDetails").innerHTML = "";
          return;
        }
        if (window.XMLHttpRequest) {
            xmlHttp = new XMLHttpRequest();
        }
          xmlHttp.onreadystatechange = function () {
          if (xmlHttp.readyState == 4) {
                  
            document.getElementById("topicDetails").innerHTML = xmlHttp.responseText;
            }
          }
            xmlHttp.open("GET", "topicfilter.php?drdnVal=" + str, true);
            xmlHttp.send();
      }


      getTopicDetails('-2');


                //function to get clip details - title, url, clipnote etc.
          function getClipDetails(str) 
          {
            if (str == "") {
              document.getElementById("clipDetails").innerHTML = "";
              return;
            }
            if (window.XMLHttpRequest) {
                xmlHttp = new XMLHttpRequest();
            }
              xmlHttp.onreadystatechange = function () {
              if (xmlHttp.readyState == 4) {
                      
                document.getElementById("clipDetails").innerHTML = xmlHttp.responseText;
                }
              }

                xmlHttp.open("GET", "clipfilter.php?drdnVal=" + str, true);
                xmlHttp.send();
          };