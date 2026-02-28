@section('title', 'Terms and Conditions')
@section('description', 'Terms and Conditions')
@section('keywords', 'Terms and Conditions')

@extends('layouts.master')
@section('content')
    <section class="emPage__public padding-t-70">
        
            <style>
        
        h1 {
            color: #333;
        }

        /*form {*/
        /*    max-width: 400px;*/
        /*    margin: 20px 0;*/
        /*}*/

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .social-links {
            margin-top: 20px;
        }

        .social-links a {
            display: inline-block;
            margin-right: 10px;
        }
    </style>

        <!-- Start title -->
        <div class="emTitle_co padding-5 padding-l-20">
            <h2 class="size-16 weight-500 color-primary mb-1">Contact Us</h2>
        </div>
        <!-- End. title -->

        <!-- Start em__pkLink -->

            <div class="card m-2">
                
                
                <div class="card-body">
                    
                    <div>
                        
                       <form action="/submit_contact_form" method="post">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                    
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                    
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" rows="4" required></textarea>
                    
                            <button type="submit">Submit</button>
                        </form>
                    
                        <div class="social-links">
                            <h4>Join us social media:</h4>
                            <a href="https://www.instagram.com/quiz_universe0/" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="https://chat.whatsapp.com/Cw1qAyD7VIkFbNB4rmm356" target="_blank"><i class="bi bi-whatsapp"></i></a>
                            <a href="https://t.me/quizunivers" target="_blank"><i class="bi bi-telegram"></i></a>
                        </div>
                    
                        <div class="social-links">
                            <h4>Contact Email</h4>
                            <p><strong><i class="bi bi-envelope"></i> : </strong>info@quizuniverse.in</p>
                        </div>
                    
                        <div class="social-links">
                            <h4>Contact Whatsapp</h4>
                            <p><strong><i class="bi bi-whatsapp"></i> : </strong><a href="https://wa.me/qr/TOEFOC7D75H2H1">Click To Text</a></p>
                        </div>
     
                        
                    </div>
                    
                    
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
    </section>
@endsection
