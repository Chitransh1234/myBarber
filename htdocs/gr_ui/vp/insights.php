<div class="dashboard">
    <div class="highlight_sec">
        <div class="display_box" id="total_bookings">
            <span>TOTAL BOOKINGS</span>
            <p></p>
        </div>
        <div class="display_box" id="total_success">
            <span>COMPLETED</span>
            <p></p>
        </div>
        <div class="display_box" id="total_cancelled">
            <span>CANCELLED</span>
            <p></p>
        </div>
        <div class="display_box" id="total_revenue">
            <span>TOTAL REVENUE</span>
            <p></p>
        </div>
    </div>
    <div style="display: flex; alignd-items: flex-end; margin: 10px;">
        <div id="bar_marking">
            <p id="mark1">100</p>
            <p id="mark2">80</p>
            <p id="mark3">0</p>
        </div>
        <div id="analysis_graph">
            <div><span id="date1"></span><div id="bar1"></div></div>
            <div><span id="date2"></span><div id="bar2"></div></div>
            <div><span id="date3"></span><div id="bar3"></div></div>
            <div><span id="date4"></span><div id="bar4"></div></div>
            <div><span id="date5"></span><div id="bar5"></div></div>
            <div><span id="date6"></span><div id="bar6"></div></div>
            <div><span id="date7"></span><div id="bar7"></div></div>
        </div>
    </div>
</div>

<style>
    .highlight_sec {
        display: flex;
        justify-content: space-around;
    }
    .display_box {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 1px 4px 8px #ccc;
        margin: 10px;
        width: calc(100% / 4 - 20px);
        height: 100px;
        text-align: center;
    }
    .highlight_sec span {
        font-weight: 600;
        font-size: large;
    }
    .highlight_sec p {
        font-size: xx-large;
    }
    #analysis_graph {
        width: 40%; 
        height: 200px; 
        border-bottom: 1px solid black; 
        border-left: 1px solid black; 
        margin: 0 10px; 
        display: flex; 
        align-items: stretch;
    }
    #analysis_graph div {
        width: 14%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        font-size: x-small;
        font-weight: 600;
        align-items: center;
        transition: 0.5s ease;
    }
    #analysis_graph div:hover {
        font-size: small;
    }
    #analysis_graph div div {
        width: 50%;
        background: linear-gradient(to bottom right, #1f88eb, #023ead);
    }
    #bar_marking {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    #bar_marking p {
        margin: 0;
    }
    @media all and (max-width: 650px) {
        #analysis_graph {
            width: calc(100% - 20px);
        }
        .highlight_sec span {
            font-weight: 500;
            font-size: x-small;
        }
        .display_box {
            margin: 5px;
            width: calc(100% / 4 - 10px);
            height: 100px;
            text-align: center;
        }
    }
    
</style>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'vp/engine_r.php',
            type: 'post',
            data: {fetch: 'fetch'},
            dataType: 'json',
            success: function(data) {
                document.querySelector('#total_bookings p').innerHTML= data.booking_count;
                document.querySelector('#total_success p').innerHTML= data.success_count;
                document.querySelector('#total_cancelled p').innerHTML= data.failure_count;

                // FUNCTION MENTIONED BELOW IS FOR STATISTICAL DATA REPRESENTATION
                for(var i=1; i<=7; i++) {
                    var count= data.b_count[i];
                    if(i > 10) {
                        count= Math.trunc(count/10)+1;
                        mark2= count*5;
                        mark1= count*10;
                        document.getElementById('mark1').innerHTML= mark1;
                        document.getElementById('mark2').innerHTML= mark2;
                        var barvalue= data.b_count[i]+'0';
                        barvalue= barvalue/count;
                        barvalue= barvalue+'%';
                    } else {
                        mark2= 5;
                        mark1= 10;
                        document.getElementById('mark1').innerHTML= mark1;
                        document.getElementById('mark2').innerHTML= mark2;
                        if(data.b_count[i] == 0) {
                            var barvalue= '1%';
                        } else {
                            var barvalue= data.b_count[i]+'0%';
                        }
                    }
                    document.getElementById('bar'+i).style.height= barvalue;
                    document.getElementById('date'+i).innerHTML= data.assoc_dates[i];
                }
            },
            error: function() {
                alert('err');
            }
        });
    });
</script>