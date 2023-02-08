<script>
            //Send customers signup details to the database with AJAX
            const form = document.querySelector('.signup form'),
            submitForm = form.querySelector('.submit'),
            errorText = form.querySelector('.error');

            //prevent automatic submission when you click the form
            form.onsubmit = (e) => {
                e.preventDefault();
            }

            submitForm.onclick = () => {
                //start AJAX
                let xhr = new XMLHttpRequest();
                xhr.onload = () => {
                    if(xhr.readyState === XMLHttpRequest.DONE) {
                        if(xhr.status === 200) {
                            let data = xhr.response;
                            if(data == 'success') {
                                let word = 'Your signup was a ' + data;
                                errorText.textContent = word;
                                errorText.style.display = "block";
                            } else {
                                errorText.textContent = data;
                                errorText.style.display = "block";
                            }
                        }
                    }
                }
                xhr.open("POST", "customer_signup_code.php", true);
                let formData = new FormData(form);
                xhr.send(formData); //send the form data to php
            }

        </script>
        
        <script>
            $("#search").keyup(function(event) {
                //get the value in the search box
                var search_keyword = event.target.value;
                if (search_keyword) {
                    var url = document.location.origin + '/ieka/search.php'
                    //make an ajax call to the server with the above url
                    $.get(url, {keyword: search_keyword}, function(response, statusCode, xJR){
                        document.getElementById("search-list").innerHTML = response;
                        //display the options corresponding to the searchwords
                        document.getElementById('search-list').style.display = "block";
                });
                } else {
                    document.getElementById('search-list').style.display = "none";
                }
            });
        </script>