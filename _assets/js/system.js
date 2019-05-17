var GROCERY = GROCERY || {};
GROCERY.Sys = function(base_url) {
    this.base_url = base_url;
    this.initialize();
};

GROCERY.Sys.prototype = {
    initialize: function () {
        this.defaultSiteSetting();
    },

    /**
     * DOCUMENT ON LOAD CHANGES 
     */ 
    defaultSiteSetting:function () {
        /** DATA TABLE LOADING**/ 
        $(function () {
          $('#itemListTable').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        });
        

       /**DATE PICKER PLUGIN**/
        $('#datepicker,#dob,#driving_lic_exp_date').datepicker({
          autoclose: true,
           format: 'yyyy-mm-dd',
           todayHighlight: true,
           startDate: 'now',
           
        });

        $('.select2').select2();


        /**Alert **/ 
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    }, 

    /**
     * FIND TRAIN ON INDEX PAGE
     */ 
    ajaxCall:function () {
      var current_day;
      $('#find-trains').on('click', function(){
        dateformate = "Y-m-d";
        
        var myDate = $("#train-search-date").val();
        var s_date = myDate.split("-"); 
        var formated_date = s_date[2]+"-"+s_date[1]+"-"+s_date[0];
        dateVal = getCurrentDate('d-m-Y',0,0,formated_date);
        // var getDay = new Date(formated_date)
        // getDayofDate = getDay.getDay();
          
          days = new Array("Mon","Tues","Wed","Thu","Fri","Sat","Sun");
          if($("#train-search-date").val()!="") {
              if(dateVal['c_day']==0||dateVal['c_day']==7) {
                // current_day = days[dateVal['c_day']];
                current_day = "Sun";
              }
              else {
                current_day = days[dateVal['c_day']-1];
              }
          }else {
              current_day = "";
          }

          travelClass = new Array("1A","2A","3A","CC","FC","SL","2S","3E","GN","EA","CC","","","","");
          
          $('#tblEntAttributes tbody').html(""); /** * CLEAR TABLE DATA */
          
          var fromVal = $("#form-trains").val();
          var toVal = $("#to-trains").val();
          
          // if(($("#form-trains").val()&&$("#to-trains").val())!="") {
            $("#tableTitleFromTo").html($("#form-trains").val()+" <span style=\"color:#f39200;\"> to </span> "+$("#to-trains").val());  
          // }
          
          // $("div.title-trains h6").html($("#form-trains").val()+" - "+$("#to-trains").val());
          if($("#form-trains").val()=="") {
            var msg = "Source Station cannot be blank!";
            snackBarPopUp(msg);
          }else if($("#to-trains").val()=="") {
            var msg = "Destination Station cannot be blank!";
            snackBarPopUp(msg);
          }else {
            $("#train-data-container").show();
            $.ajax({
                // url: "json_data/train_details.json",
                url: "trains/get-all-train-between-station",
                type: "POST",
                data: {from:fromVal,to:toVal},
                beforeSend: function() {
                    var tableData = "<tr style=\"\">"+
                                        "<td style=\"padding-left:2px;\" colspan=\"5\"><div class=\"station-item align-center\">Loading...</div></td>"+
                                    "</tr>"
                    $("#tblEntAttributes tbody").append(tableData);
                },
                success: function(data){
                  $('#tblEntAttributes tbody').html(""); /** * CLEAR TABLE DATA */
                  from = getString(fromVal,"- ");
                  to = getString(toVal,"- ");
                  var trainJsonData = JSON.parse(data);
                  console.log(trainJsonData);  
                  if(trainJsonData.trainData){
                      if(trainJsonData['trainData'].length) {

                            for(var i=0; i<trainJsonData.trainData.length;i++){
                              
                                var departDays = getDepartsOnDays(trainJsonData['trainData'][i]['daysOfWeek']);
                                
                                if(current_day!="") {
                                    for(j=0;j<departDays.length;j++) {
                                     
                                          if(departDays[j]==current_day) {

                                              var durationTime = getString(trainJsonData['trainData'][i]['duration'],".");
                                              var tableData = "<tr style=\"height:165px;\">"+
                                                                  "<td><span class=\"image\"> <img src=\"theme/images/icon/train.png\" ></span><div class=\"no-train\"><span>"+trainJsonData['trainData'][i]['trainName']+"</span>(Train No: \""+trainJsonData['trainData'][i]['trainNumber']+"\")</div><div class=\"depart-item color-green\" style=\"width:150px;\"><span class=\"time\">Departs On:</span> "+departDays+"</div><div class=\"\" style=\"position:absolute; width:450px; z-index:200;\"><a class=\"btn link-button\" href=\"trains/train-route-enquiry?train-no="+trainJsonData['trainData'][i]['trainNumber']+"&train-name="+trainJsonData['trainData'][i]['trainName']+"\">Time Table</a><a class=\"btn link-button\" href=\"trains/spot-train?train-no="+trainJsonData['trainData'][i]['trainNumber']+"&train-name="+trainJsonData['trainData'][i]['trainName']+"\">Status</a><a class=\"btn link-button\" href=\"trains/train-seats?from-trains="+from[1]+"&to-trains="+to[1]+"&train-no="+trainJsonData['trainData'][i]['trainNumber']+"&train-name="+trainJsonData['trainData'][i]['trainName']+"\">Seat Availability</a><a class=\"btn link-button\" href=\"trains/train-fare?from-trains="+from[1]+"&to-trains="+to[1]+"&train-no="+trainJsonData['trainData'][i]['trainNumber']+"&train-name="+trainJsonData['trainData'][i]['trainName']+"\">Fare Enquiry</a></div></td>"+
                                                                  "<td><div class=\"depart-item\"><span class=\"time\">"+trainJsonData['trainData'][i]['departureTime']+"\</span></div><div class=\"depart-item\"><span class=\"time\">"+trainJsonData['trainData'][i]['arrivalTime']+"</span></div></td>"+
                                                                  "<td style=\"padding-left:2px;\"><div class=\"station-item\">"+trainJsonData['trainData'][i]['originStation']+"</div><div class=\"station-item\">"+trainJsonData['trainData'][i]['destinationStation']+"</div></td>"+
                                                                  "<td>"+
                                                                      "<div class=\"duration-time\">"+durationTime[0]+"&nbsp;h&nbsp;"+durationTime[1]+"&nbsp;m"+"</div>"+
                                                                      "<div class=\"duration-option\" id=\"durationOption"+i+"\">"+
                                                                      "</div>"+
                                                                  "</td>"+
                                                                  "<td class=\"\" id=\"fareTd"+i+"\">"+
                                                                  "</td>"+
                                                              "</tr>"
                                                              // "<tr>"+
                                                              //   "<td colspan=\"5\"><div class=\"\"><button type=\"button\" class=\"btn\">Time Table</button><button type=\"button\" class=\"btn\">Status</button><button type=\"button\" class=\"btn\">Seat Availability</button><button type=\"button\" class=\"btn\">Fare Enquiry</button></div></td>"+
                                                              // "</tr>"
                                                              ;
                                              
                                              $("#tblEntAttributes tbody").append(tableData);
                                              
                                              /**
                                               * Append Travel Class Filter Data
                                               */ 
                                              newClassArray = getTravelClass(travelClass,trainJsonData['trainData'][i]['classes']);
                                              for(var nc=0;nc<newClassArray.length;nc++){
                                                  $("#durationOption"+i).append("<div class=\"item\">"+newClassArray[nc]+"</div>");  
                                              }// FOR LOOP END
                                              
                                              /**
                                               * Append Fares Filter Data
                                               */ 
                                              newFareArray = getFareForClass(trainJsonData['trainData'][i]['fares']);
                                              for(var nf=0;nf<newFareArray.length;nf++) {
                                                $("#fareTd"+i).append("<div class=\"price-item\"><span class=\"price\">"+newFareArray[nf]+"&nbsp;</span><span class=\"unit\"><i class=\"fa fa-rupee\"></i></span></div>");
                                              }// FOR LOOP END

                                          } 
                                      } // FOR LOOP END 
                                     
                                  }else {
                                    
                                      var durationTime = getString(trainJsonData['trainData'][i]['duration'],".");
                                          var tableData = "<tr style=\"height:165px;\">"+
                                                              "<td><span class=\"image\"> <img src=\"theme/images/icon/train.png\" ></span><div class=\"no-train\"><span>"+trainJsonData['trainData'][i]['trainName']+"</span>(Train No: \""+trainJsonData['trainData'][i]['trainNumber']+"\")</div><div class=\"depart-item color-green\" style=\"width:150px;\"><span class=\"time\">Departs On:</span> "+departDays+"</div><div class=\"\" style=\"position:absolute; width:450px; z-index:200;\"><a class=\"btn link-button\" href=\"trains/train-route-enquiry?train-no="+trainJsonData['trainData'][i]['trainNumber']+"&train-name="+trainJsonData['trainData'][i]['trainName']+"\">Time Table</a><a class=\"btn link-button\" href=\"trains/spot-train?train-no="+trainJsonData['trainData'][i]['trainNumber']+"&train-name="+trainJsonData['trainData'][i]['trainName']+"\">Status</a><a class=\"btn link-button\" href=\"trains/train-seats?from-trains="+from[1]+"&to-trains="+to[1]+"&train-no="+trainJsonData['trainData'][i]['trainNumber']+"&train-name="+trainJsonData['trainData'][i]['trainName']+"\">Seat Availability</a><a class=\"btn link-button\" href=\"trains/train-fare?from-trains="+from[1]+"&to-trains="+to[1]+"&train-no="+trainJsonData['trainData'][i]['trainNumber']+"&train-name="+trainJsonData['trainData'][i]['trainName']+"\">Fare Enquiry</a></div></td>"+
                                                              "<td><div class=\"depart-item\"><span class=\"time\">"+trainJsonData['trainData'][i]['departureTime']+"\</span></div><div class=\"depart-item\"><span class=\"time\">"+trainJsonData['trainData'][i]['arrivalTime']+"</span></div></td>"+
                                                              "<td style=\"padding-left:2px;\"><div class=\"station-item\">"+trainJsonData['trainData'][i]['originStation']+"</div><div class=\"station-item\">"+trainJsonData['trainData'][i]['destinationStation']+"</div></td>"+
                                                              "<td>"+
                                                                  "<div class=\"duration-time\">"+durationTime[0]+"&nbsp;h&nbsp;"+durationTime[1]+"&nbsp;m"+"</div>"+
                                                                  "<div class=\"duration-option\" id=\"durationOption"+i+"\">"+
                                                                  "</div>"+
                                                              "</td>"+
                                                              "<td class=\"\" id=\"fareTd"+i+"\">"+
                                                              "</td>"+
                                                          "</tr>"
                                                          // "<tr>"+
                                                          //   "<td colspan=\"5\"><div class=\"\"><button type=\"button\" class=\"btn\">Time Table</button><button type=\"button\" class=\"btn\">Status</button><button type=\"button\" class=\"btn\">Seat Availability</button><button type=\"button\" class=\"btn\">Fare Enquiry</button></div></td>"+
                                                          // "</tr>"
                                                          ;
                                          
                                          $("#tblEntAttributes tbody").append(tableData);
                                          
                                          /**
                                           * Append Travel Class Filter Data
                                           */ 
                                          newClassArray = getTravelClass(travelClass,trainJsonData['trainData'][i]['classes']);
                                          for(var nc=0;nc<newClassArray.length;nc++){
                                              $("#durationOption"+i).append("<div class=\"item\">"+newClassArray[nc]+"</div>");  
                                          }// FOR LOOP END
                                          
                                          /**
                                           * Append Fares Filter Data
                                           */ 
                                          newFareArray = getFareForClass(trainJsonData['trainData'][i]['fares']);
                                          for(var nf=0;nf<newFareArray.length;nf++) {
                                            $("#fareTd"+i).append("<div class=\"price-item\"><span class=\"price\">"+newFareArray[nf]+"&nbsp;</span><span class=\"unit\"><i class=\"fa fa-rupee\"></i></span></div>");
                                          }// FOR LOOP END
                                  }
                                
                              } // FOR LOOP END
                              $(".number-list").html("1 to "+$('#tblEntAttributes tbody').find('tr').length+"&nbsp;&nbsp;<a href=\"#\" class=\"prev  icon-left-open\" title=\"\"></a><a href=\"#\" class=\"next  icon-right-open\" title=\"\"></a>");
                          }

                      }  else {
                          
                           var tableData = "<tr style=\"\">"+
                                                        "<td style=\"padding-left:2px;\" colspan=\"5\"><div class=\"station-item align-center\">"+trainJsonData['error']+"</div></td>"+
                                                    "</tr>"
                          $("#tblEntAttributes tbody").append(tableData);
                      } /* Else End*/



                },
                error:function(req, status, err) {
                    console.log(req);
                    console.log(status);
                    console.log(err);
                }
            });
          } // Else End
        })// Button Click end          
    },
    
    /** 
     * ON PAGE LOAD GET TRAIN DETAILS FOR CHECK SEAT AVAILABILITY PAGE
     */ 
    
}


