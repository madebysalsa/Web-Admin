<!-- Begin Page Content -->

<style>
#my-calendar {
  background-color: #f6f6f6;
  min-height: 200px;
  position: relative;
  overflow: hidden;
}
#my-calendar .calendar-event {
  position: absolute;
  z-index: 30;
  top: 100%;
  left: 0;
  width: 100%;
  height: 100%;
  transition: .3s;
}
#my-calendar .calendar-event.show {
  top: 0;
}
#my-calendar .calendar-event .card-body {
  overflow-y: auto;
}
#my-calendar .calendar-event .close-btn {
  cursor: pointer;
}
#my-calendar .clndr-controls {
  display: flex;
  min-height: 45px;
  align-items: center;
  padding: 1px 1px 0;
}
#my-calendar .clndr-controls .month {
  flex: 1;
  text-align: center;
}
#my-calendar .clndr-control-button {
  display: flex;
  align-self: stretch;
  width: calc(100% / 7);
  justify-content: center;
  align-items: center;
  cursor: pointer;
  position: relative;
  background-color: #f6f6f6;
  box-shadow: 0 0 0 1px #dcdcdc;
}
#my-calendar .clndr-control-button::before {
  content: '\f104';
  font-family: 'fontawesome';
}
#my-calendar .clndr-control-button:last-child {
  border-right: 0;
}
#my-calendar .clndr-control-button:last-child::before {
  content: '\f105';
}
#my-calendar .clndr-previous-button, #my-calendar .clndr-next-button {
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 10;
  opacity: 0;
}
#my-calendar .clndr-table {
  border-collapse: collapse;
  width: 100%;
  text-align: center;
}
#my-calendar .clndr-table .header-day {
  font-weight: bold;
  font-size: 13px;
  height: 40px;
  border: 1px solid #dcdcdc;
}
#my-calendar .clndr-table .day {
  vertical-align: top;
  height: 55px;
  border: 1px solid #dcdcdc;
  background-color: #fff;
  cursor: pointer;
}
#my-calendar .clndr-table .day.event > .day-contents {
  background-color: #1e73be;
  color: #fff;
}
#my-calendar .clndr-table .day.today {
  background-color: #ffe0e0;
}
#my-calendar .clndr-table .day-contents {
  font-size: 12px;
  font-weight: bold;
  color: #666;
  background-color: #e2e2e2;
}
#my-calendar .clndr-table .last-month,
#my-calendar .clndr-table .next-month {
  opacity: 0;
}

</style>
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

          
            

        
        </div>
        
        <!--/kopi ya cop/-->
        <div class="card">
          <div class="container">
          <div class="container pt-5">
            <div id="my-calendar">
              <div class="calendar-event card">
                <div class="card-header p-2 d-flex align-items-center">
                  <div class="font-weight-bold card-heading">Event date</div><span class="ml-auto text-secondary close-btn js-close-event"><i class="fa fa-times"></i></span>
                </div>
                <div class="card-body px-2 py-1 js-calendar-content">
                  <ul class="list-unstyled mb-0">
                    <li class="py-1">
                      <div class="p-2 border"> <small class="text-muted">2018-10-3</small>
                        <div>Persian Kitten Auction</div>
                      </div>
                    </li>
                    <li class="py-1">
                      <div class="p-2 border"> <small class="text-muted">2018-10-3</small>
                        <div>Persian Kitten Auction</div>
                      </div>
                    </li>
                    <li class="py-1">
                      <div class="p-2 border"> <small class="text-muted">2018-10-3</small>
                        <div>Persian Kitten Auction</div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>

      </div>
          </div>

        <!-- /.container-fluid -->

      </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clndr/1.4.7/clndr.min.js"></script>


      <script>
      (function(){ 
  var events = [
  ];
  $(document).on('click', '.js-close-event', function(){
    $('.calendar-event').removeClass('show');
  });
  var calendarEvent = $('#my-calendar').html();
  $('#my-calendar').clndr({
    events: events,
    clickEvents: {
      click: function(target) {
        if(target.events.length) {
          changeEvent(target.events);
          $('.calendar-event').addClass('show');
        }
      }
    },
    adjacentDaysChangeMonth: true
  });
  function changeEvent(events) {
    var ul = document.createElement('ul');
    ul.classList = "list-unstyled mb-0";
    events.map(item => {
      var li = document.createElement('li');
      li.classList = "py-1";
      var wrap = document.createElement('div');
      wrap.classList = "p-2 border";
      var small = document.createElement('small');
      small.classList = "text-muted";
      var dateText = document.createTextNode(item.date);
      small.appendChild(dateText);
      var text = document.createElement('div');
      var titleText = document.createTextNode(item.title);
      text.appendChild(titleText);
      wrap.appendChild(small);
      wrap.appendChild(text);
      li.appendChild(wrap);
      ul.appendChild(li);
    });
    $('.js-calendar-content').html(ul);
  }
  $("#my-calendar").append(calendarEvent);
})();

      </script>
      <!-- End of Main Content -->