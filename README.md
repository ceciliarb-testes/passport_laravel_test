# passport_laravel_test

## rotas
```
+--------+----------+-----------------------------------------+----------------------------------+---------------------------------------------------------------------------+----------------------------+
| Domain | Method   | URI                                     | Name                             | Action                                                                    | Middleware                 |
+--------+----------+-----------------------------------------+----------------------------------+---------------------------------------------------------------------------+----------------------------+
|        | GET|HEAD | /                                       |                                  | Closure                                                                   | web                        |
|        | GET|HEAD | api/home                                | home                             | App\Http\Controllers\HomeController@index                                 | api,auth:api_passport,auth |
|        | POST     | api/login-client-credentials            |                                  | App\Http\Controllers\PassportController@loginClientCredentials            | api                        |
|        | POST     | api/login-password                      |                                  | App\Http\Controllers\PassportController@loginPassword                     | api                        |
|        | POST     | api/logout                              |                                  | App\Http\Controllers\PassportController@logout                            | api,auth:api_passport      |
|        | GET|HEAD | api/newTokenEleitor                     |                                  | Closure                                                                   | api,auth:api_passport      |
|        | GET|HEAD | api/newTokenMesario                     |                                  | Closure                                                                   | api,auth:api_passport      |
|        | GET|HEAD | api/newTokenUrna                        |                                  | Closure                                                                   | api,auth:api_passport      |
|        | POST     | api/register                            |                                  | App\Http\Controllers\PassportController@register                          | api                        |
|        | GET|HEAD | api/user                                |                                  | Closure                                                                   | api,auth:api_passport      |
|        | GET|HEAD | callback                                |                                  | Closure                                                                   | web                        |
|        | GET|HEAD | callbackImplicit                        |                                  | Closure                                                                   | web                        |
|        | GET|HEAD | home                                    | home                             | App\Http\Controllers\HomeController@index                                 | web,auth                   |
|        | GET|HEAD | login                                   | login                            | App\Http\Controllers\Auth\LoginController@showLoginForm                   | web,guest                  |
|        | POST     | login                                   |                                  | App\Http\Controllers\Auth\LoginController@login                           | web,guest                  |
|        | POST     | logout                                  | logout                           | App\Http\Controllers\Auth\LoginController@logout                          | web                        |
|        | POST     | oauth/personal-access-tokens            | passport.personal.tokens.store   | Laravel\Passport\Http\Controllers\PersonalAccessTokenController@store     | web,auth                   |
|        | GET|HEAD | oauth/personal-access-tokens            | passport.personal.tokens.index   | Laravel\Passport\Http\Controllers\PersonalAccessTokenController@forUser   | web,auth                   |
|        | DELETE   | oauth/personal-access-tokens/{token_id} | passport.personal.tokens.destroy | Laravel\Passport\Http\Controllers\PersonalAccessTokenController@destroy   | web,auth                   |
|        | GET|HEAD | oauth/scopes                            | passport.scopes.index            | Laravel\Passport\Http\Controllers\ScopeController@all                     | web,auth                   |
|        | POST     | oauth/token                             | passport.token                   | Laravel\Passport\Http\Controllers\AccessTokenController@issueToken        | throttle                   |
|        | POST     | oauth/token/refresh                     | passport.token.refresh           | Laravel\Passport\Http\Controllers\TransientTokenController@refresh        | web,auth                   |
|        | GET|HEAD | oauth/tokens                            | passport.tokens.index            | Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@forUser | web,auth                   |
|        | DELETE   | oauth/tokens/{token_id}                 | passport.tokens.destroy          | Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy | web,auth                   |
|        | POST     | password/email                          | password.email                   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail     | web,guest                  |
|        | GET|HEAD | password/reset                          | password.request                 | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm    | web,guest                  |
|        | POST     | password/reset                          | password.update                  | App\Http\Controllers\Auth\ResetPasswordController@reset                   | web,guest                  |
|        | GET|HEAD | password/reset/{token}                  | password.reset                   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm           | web,guest                  |
|        | GET|HEAD | redirect                                |                                  | Closure                                                                   | web                        |
|        | GET|HEAD | redirectImplicit                        |                                  | Closure                                                                   | web                        |
|        | GET|HEAD | register                                | register                         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm         | web,guest                  |
|        | POST     | register                                |                                  | App\Http\Controllers\Auth\RegisterController@register                     | web,guest                  |
|        | GET|HEAD | teste                                   |                                  | Closure                                                                   | web                        |
|        | GET|HEAD | teste2                                  |                                  | Closure                                                                   | web                        |
+--------+----------+-----------------------------------------+----------------------------------+---------------------------------------------------------------------------+----------------------------+
```
