
<button onclick="location.href='/logout';" > Logout </button>
<!-- Client popup -->
<div class="modal fade" id="openinvestor" >
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        
      <div class="modal-header h5  "> <div class="col-11 modal-title text-center" id="inmodaltitle"></div></div>

      <div class="modal-body">
        <div class="container-fluid" id="modalbody">

        <div class="row">
            <div class="col-2 h6  ">Client Number </div>
            <div class="col-4 " id="ineanum"> </div>
            <div class="col-2 h6  ">Expires on </div>
            <div class="col-4 "id="inexpy"></div>
        </div>
        <hr>
        
        <div class="row">
              <div class="col-3 h6  " >Abstract</div>
              <div class="col-9 " id="ineaabstract"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6  ">Risk 
            </div>
            <div class="col-4 "id="inrisk">
            </div>
            <div class="col-2 h6  ">Currency 
            </div>
            <div class="col-4 "id="incurr">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6  ">Product type 
            </div>
            <div class="col-4 "id="inprotype">
            </div>
            <div class="col-2 h6  ">Instruments 
            </div>
            <div class="col-4 "id="ininstrument">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6  ">Major Sector 
            </div>
            <div class="col-4 "id="inmajsector">
            </div>
            <div class="col-2 h6  ">Minor Sector 
            </div>
            <div class="col-4 "id="inminsector">
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-2 h6  ">Region 
            </div>
            <div class="col-4 "id="inregion">
            </div>
            <div class="col-2 h6  ">Countries 
            </div>
            <div class="col-4 "id="incountry">
            </div>
          </div>
          <hr>


          <div class="row">
            <div class="col-2 h6  ">Content 
            </div>
            <div class="col-10 "id="incontent">
            </div>
          </div>

        </div>
    </div>
      
      <div class="modal-footer">
      <!-- close pop up -->
        <button data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 
<div class="container text-nowrap " >
          <h1 class="text-center">Ideas</h1>
          <table class="table table-hover  " id="newideastable">
            <thead >
              <tr class="text-center" >
                <th  >No.</th>
                <th  >Risk</th>
                <th  >Publish Date</th>
                <th  >Expiry Date</th>
                <th  >Title</th>
                <th  >Abstract</th>
                <th  >Content</th>
              <th>product_type</th>
              <th>instruments</th>
              <th>currency</th>
              <th>major_sector</th>
              <th>minor_sector</th>
              <th>region</th>
              <th>country</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
<div class="container text-nowrap">
          <h1 class="text-center">Clients</h1>
          <table class="table table-hover  " id="investorslisttable">
              <thead>
                <tr class="text-center">
                  <th  >Name</th>
                  <th >Risk Rating</th>
                  <th >Key terms</th>
                  <th >Details</th>
                   <th>product_type</th>
              <th>instruments</th>
              <th>currency</th>
              <th>major_sector</th>
              <th>minor_sector</th>
              <th>region</th>
              <th>country</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
        </div>
<!-- Calling all init functions-->
<script>

function setElementInnerHTML(stringa, stringb) {
    var element = document.getElementById(stringa);
      element.innerHTML = stringb;
}
//sets the content for Clients pop up
function setinvestormodal(investorid) {
      fetch("api/getinvestor/"+investorid,{
          method: "get",
          headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
          }
        })
        .then((response) => {
            if (response.ok) {
              return response.json(); // extract the JSON data from the response
            } else { throw new Error('response was not ok');}
        })
      .then((data) =>{ 
       setElementInnerHTML("inmodaltitle",data.investorinfo.name);
       setElementInnerHTML("ineanum",data.investorinfo.investor_id);
       setElementInnerHTML("ineaabstract",data.investorinfo.key_terms);
       setElementInnerHTML("inexpy",data.investorinfo.expires_on);
       setElementInnerHTML("inrisk",data.investorinfo.risk);
       setElementInnerHTML("incurr",data.investorinfo.currency);
       setElementInnerHTML("inprotype",data.investorinfo.product_type);
       setElementInnerHTML("ininstrument",data.investorinfo.instruments);
       setElementInnerHTML("inmajsector",data.investorinfo.major_sector);
       setElementInnerHTML("inminsector",data.investorinfo.minor_sector);
       setElementInnerHTML("inregion",data.investorinfo.region);
       setElementInnerHTML("incountry",data.investorinfo.country);
       setElementInnerHTML("incontent",data.investorinfo.preferences);
      }
        );
}

//fetch and display the contents of the new ideas table
  let table = new DataTable('#newideastable', {
    pageLength: 10,
    scroller:    true,
    scrollX: true,
    scrollY: false,
    "ordering": false,
        fixedColumns: {
          left: 1,
          right: 1
      },
    "language": {
      "lengthMenu": '',
      "paginate": {
                  page: 'Page %d',
                  pageOf: 'of %d',
                  info: '',
                  infoEmpty: 'No ideas to display',
                  infoFiltered: '(filtered from %d total records)',
            }
      },
      "ajax": {
        "url": "/rmnewideas",
        "dataSrc": "",
        "type": "GET",
        "dataType": "json"
      },
      
      "columns": [
        { "data": "idea_number" },
        { "data": "risk" },
        { "data": "published_on" },
        { "data": "expires_on" },
        { "data": "title" },
        { "data": "abstract" },
        { "data": "content" },
        { "data": "product_type" },
        { "data": "instruments" },
        { "data": "currency" },
        { "data": "major_sector" },
        { "data": "minor_sector" },
        { "data": "region" },
        { "data": "country" },
      
      ],
      
  });


  //Clients data table 
  let table3 = new DataTable('#investorslisttable', {
    pageLength: 10,
    scroller:    true,
    "searching": false,
    "ordering": false,
    scrollX: true,
    scrollY: false,
    fixedColumns: {
          left: 1,right:1
      },
    "language": {
      "lengthMenu": ''},
    "ajax": {
        "url": "/rminvestorslist",
        "dataSrc": "",
        "type": "GET",
        "dataType": "json"
      },
      
      "columns": [
        { "data": "name" },
        { "data": "risk" },
        { "data": "key_terms" },
        { "data": "product_type" },
        { "data": "instruments" },
        { "data": "currency" },
        { "data": "major_sector" },
        { "data": "minor_sector" },
        { "data": "region" },
        { "data": "country" },
        { render: function ( data, type, row, meta) { 
            if(type === 'display'){
              return `<button type="button" onclick="setinvestormodal(${row.investor_id})"  
              data-bs-toggle="modal" data-bs-target="#openinvestor" >View</button>`; 
            }           
          },  "defaultContent":"choices" }
      ],
  });

</script>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>