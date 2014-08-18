//filters at university level

  //function to filter collection to display topics
  function getUniCollectionDetails(str) 
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
        xmlHttp.open("GET", "filter/unicollectionfilter.php?collectionID=" + str, true);
        xmlHttp.send();
  }


  //function to filter topic to display clips
  function getUniTopicDetails(str) 
  {
    if (str == "") 
    {
      document.getElementById("topicDetails").innerHTML = "";
      return;
    }
    if (window.XMLHttpRequest) 
    {
        xmlHttp = new XMLHttpRequest();
    }
      xmlHttp.onreadystatechange = function () 
      {
        if (xmlHttp.readyState == 4) 
        {
          document.getElementById("topicDetails").innerHTML = xmlHttp.responseText;
        }
      }
        xmlHttp.open("GET", "filter/unitopicfilter.php?topicID=" + str, true);
        xmlHttp.send();
  }


  //function to get clip details - title, url, clipnote etc.
  function getUniClipDetails(str) 
  {
    if (str == "") 
    {
      document.getElementById("clipDetails").innerHTML = "";
      return;
    }
    if (window.XMLHttpRequest) 
    {
        xmlHttp = new XMLHttpRequest();
    }
      xmlHttp.onreadystatechange = function () 
      {
        if (xmlHttp.readyState == 4) 
        {
          document.getElementById("clipDetails").innerHTML = xmlHttp.responseText;
        }
      }

        xmlHttp.open("GET", "filter/uniclipfilter.php?clipID=" + str, true);
        xmlHttp.send();
  };



//filters at user level   

  //function to filter collection to display topics
  function getCollectionDetails(str) 
  {
    if (str == "") 
    {
      document.getElementById("collectionDetails").innerHTML = "";
      return;
    }
    if (window.XMLHttpRequest) 
    {
      xmlHttp = new XMLHttpRequest();
    }
      xmlHttp.onreadystatechange = function () 
      {
        if (xmlHttp.readyState == 4) 
        {
                
          document.getElementById("collectionDetails").innerHTML = xmlHttp.responseText;
        }
      }
        xmlHttp.open("GET", "filter/usercollectionfilter.php?collectionID=" + str, true);
        xmlHttp.send();
  }

  //function to filter collection to display topics
  function getCollectionTopic(str) 
  {
    if (str == "") 
    {
      document.getElementById("collectionTopic").innerHTML = "";
      return;
    }
    if (window.XMLHttpRequest) 
    {
      xmlHttp = new XMLHttpRequest();
    }
      xmlHttp.onreadystatechange = function () 
      {
        if (xmlHttp.readyState == 4) 
        {
                
          document.getElementById("collectionTopic").innerHTML = xmlHttp.responseText;
        }
      }
        xmlHttp.open("GET", "topic.php?collectionID=" + str, true);
        xmlHttp.send();
  }

  //function to filter topics to display clips
  function getTopicDetails(str) 
  {
    if (str == "") 
    {
      document.getElementById("topicDetails").innerHTML = "";
      return;
    }
    if (window.XMLHttpRequest) 
    {
        xmlHttp = new XMLHttpRequest();
    }
      xmlHttp.onreadystatechange = function () 
      {
        if (xmlHttp.readyState == 4) 
        {
          document.getElementById("topicDetails").innerHTML = xmlHttp.responseText;
        }
      }
        xmlHttp.open("GET", "filter/usertopicfilter.php?topicID=" + str, true);
        xmlHttp.send();
  }


  //function to get clip details - title, url, clipnote etc.
  function getClipDetails(str) 
  {
    if (str == "") 
    {
      document.getElementById("clipDetails").innerHTML = "";
      return;
    }
    if (window.XMLHttpRequest) 
    {
        xmlHttp = new XMLHttpRequest();
    }
      xmlHttp.onreadystatechange = function () 
      {
        if (xmlHttp.readyState == 4) 
        {
          document.getElementById("clipDetails").innerHTML = xmlHttp.responseText;
        }
      }

        xmlHttp.open("GET", "filter/userclipfilter.php?clipID=" + str, true);
        xmlHttp.send();
  };