<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form  method="POST" action="{{route('login') }}">
        @csrf
        <div>
            <div>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Email</legend>
                    <input type="email" name="email" class="input w-full" placeholder="jean@gmail.com" required/>
                    @error('email')
                    <p class="label">{{$message}}</p>
                    @enderror
                </fieldset>
            </div>
            <div>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Password</legend>
                    <input type="password" name="password" class="input w-full" placeholder="mots de passe" required/>
                    @error('password')
                    <p class="label">{{$message}}</p>
                    @enderror
                </fieldset>
            
            </div>
        </div>
        <button>Login</button>
    </form> 
</body>
</html>