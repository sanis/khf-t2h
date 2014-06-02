<?php

View::share('frontAssetDir',Config::get('frontend::paths.frontAssetDir'));

Route::get('/logout.html', function() {
        Sentry::logout();
        return Redirect::back() ;
    }
);

Route::post('/login.html', function() {
        try
        {
            // Login credentials
            $credentials = array(
                'email'    => Input::get('email'),
                'password' => Input::get('password'),
            );

            // Authenticate the user
            $user = Sentry::authenticate($credentials, false);
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            return Redirect::back();
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            return Redirect::back();
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            return Redirect::back();
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Redirect::back();
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            return Redirect::back();
        }

        // The following is only required if the throttling is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            return Redirect::back();
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            return Redirect::back();
        }
        return Redirect::back();

        // cheats heh?
    }
);