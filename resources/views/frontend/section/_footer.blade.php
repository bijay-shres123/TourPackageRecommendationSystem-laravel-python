<footer class="footer-distributed ">
            <div class="container">
                <div class="footer-left">
                    <img src="{{asset('/frontend/images/VS.jpg')}}">
                    <h3>About<span>TSPOT</span></h3>

                    <p class="footer-links">
                        <a href="#">Home</a>
                        |
                        <a href="#">Blog</a>
                        |
                        <a href="#">About</a>
                        |
                        <a href="#">Contact</a>
                    </p>

                    <p class="footer-company-name">© 2019 TSPOT Pvt. Ltd.</p>
                </div>

                <div class="footer-center">
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <p><span></span>
                            Kathmandu, Nepal</p>
                    </div>

                    <div>
                        <i class="fa fa-phone"></i>
                        <p>+91 22-27782183</p>
                    </div>
                    <div>
                        <i class="fa fa-envelope"></i>
                        <p><a href="mailto:support@tspot.com">support@tspot.com</a></p>
                    </div>
                </div>
                <div class="footer-right">
                    <p class="footer-company-about">
                        <span>About the company</span>
                        We provide best travel solution.</p>
                    <div class="footer-icons">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript">
$(document).ready(function(){

 $('#country_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countryList').fadeIn();  
                    $('#countryList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#country_name').val($(this).text());  
        $('#countryList').fadeOut();  
    });  

});

var button = document.getElementById('myButton');
    button.onclick = function() {
      location.assign('http://touristlara.com/article-list');
    }
</script>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

