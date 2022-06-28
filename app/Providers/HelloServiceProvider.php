// use Validator;　追加する
// use App\Http\Validators\HelloValidator;　追加する

public function boot()
{
   $validator = $this->app['validator'];
   $validator->resolver(function($translator, $data, 
          $rules, $messages) {
       return new HelloValidator($translator, $data, 
             $rules, $messages);
   });
}