    </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Bino Johnson 2023</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
        <script>
    window.addEventListener('load', function () {
        var inputElement = document.getElementById('autocomplete-input');

        if (inputElement) {
        inputElement.focus();
        }
    });
    </script>
<script>
$(function() {
    $("#autocomplete-input").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '<?php echo base_url('Masters/autocompleteData');?>',
                type: 'GET',
                data: {
                    query: request.term
                },
                dataType: 'json',
                success: function(data) {
                    var menuItems = data.map(function(item) {
                        var link = '<?php echo base_url(); ?>' + item.pm_menu_url;
                        var label = $('<a>').attr('href', link).html(item.pm_menu_name);
                        return {
                            label: label, 
                            value: link 
                        };
                    });

                    response(menuItems);
                }
            });
        },
        minLength: 1,
        select: function(event, ui) {
            window.location.href = ui.item.value; 
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        return $("<li>")
            .append(item.label)
            .appendTo(ul);
    };
});
$(document).ready(function() {
    function fetchNews() {
        $.ajax({
            url: '<?php echo base_url('API/fetchNews');?>', 
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.length > 0) {
                    var newsHTML = '';
                    for (var i = 0; i < Math.min(response.length, 4); i++) {
                        var article = response[i];
                        newsHTML += `
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="card">
                                    <img src="${article.urlToImage}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">${article.title}</h5>
                                        <p class="card-text">${article.description}</p>
                                        <a href="${article.url}"  target="_blank">Read more</a>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                    $('#newsContainer').html(newsHTML);
                }
            },
            error: function() {
                console.log('Error fetching news');
            }
        });
    }

    fetchNews();
});
$(document).ready(function() {
    function getWeather() {
        $.ajax({
            url: '<?php echo base_url('API/GetWeather');?>', 
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.cod === 200) {
                    var temperature = (response.main.temp - 273.15).toFixed(2);
                    var description = response.weather[0].description;

                    var weatherData = `<span style="color: #36a0ff;">Temperature: ${temperature}°C</span>&nbsp;&nbsp;<span style="color: #ff6384;"> ${description}</span>`;
                    
                    $('#weather-data').html(weatherData);
                } else {
                    console.log("Error: " + response.message);
                }
            },
            error: function() {
                console.log("Failed to fetch weather data.");
            }
        });
    }

    getWeather();

    setInterval(getWeather, 600000); 
});
$(document).ready(function() {
    function updateTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        hours = (hours < 10 ? '0' : '') + hours;
        minutes = (minutes < 10 ? '0' : '') + minutes;
        seconds = (seconds < 10 ? '0' : '') + seconds;

        var currentTime = hours + ":" + minutes + ":" + seconds;

        $('#current-time').text(currentTime);

        setTimeout(updateTime, 1000);
    }

    updateTime();
});


</script>
<script src="<?php echo base_url('assets/admin_assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Include jQuery UI for Datepicker -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<!-- Other scripts -->
<script src="<?php echo base_url('assets/plugins/dataTables/js/datatables.min.js')?>"></script>
<script src="<?php echo base_url('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_assets/js/sb-admin-2.min.js') ?>"></script>



  </div>
    </div>
</body>

</html>