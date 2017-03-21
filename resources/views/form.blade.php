<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Challenge</title>
     
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="app" class="row">
            <div class="small-12 medium-8 medium-offset-2 columns">
            <h2 class="text-center mini-form__title">People Signup</h2>
                <form method="POST" action="/people/store" @submit.prevent="onSubmit">
                    {{ csrf_field() }}
                    <section v-for="data in data" class="mini-form">
                        <h4 class="mini-form__title">Person: @{{data.first_name + ' ' + data.last_name}}</h4>
                        <div class="row">
                            <div class="small-12 medium-6 columns">
                                <input type="text" name="first_name" v-model="data.first_name" placeholder="First Name" />
                            </div>
                            <div class="small-12 medium-6 columns">
                                <input type="text" name="last_name" v-model="data.last_name" placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="small-12 medium-6 columns">    
                                <input type="text" name="age" v-model="data.age" placeholder="Age" />
                            </div>
                            <div class="small-12 medium-6 columns">
                                <input type="email" name="email" v-model="data.email" placeholder="Email" />
                            </div>
                        </div>
                        <input type="password" name="secret" v-model="data.secret" placeholder="Password" />
                    </section>
                    <div class="row">
                        <div class="small-12 medium-6 columns">
                            <button type="button" class="button expanded success" @click="addPerson"> add a person</button>
                        </div>
                        <div class="small-12 medium-6 columns">
                            <button type="button" class="button expanded alert" @click="removePerson"> Remove a person</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns">
                            <button type="button" class="button expanded large mini-form__button" @click="onSubmit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="/js/manifest.js"></script>
        <script src="/js/vendor.js"></script>
        <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
        <script src="/js/app.js"></script>

    </body>
</html>
