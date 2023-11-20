namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueWithinUser implements Rule
{
    protected $parameters;

    public function __construct(...$parameters)
    {
        $this->parameters = $parameters;
    }

    public function passes($attribute, $value)
    {
        $ignoreId = isset($this->parameters[2]) ? $this->parameters[2] : null;
        $userId = isset($this->parameters[3]) ? $this->parameters[3] : null;

        // Implement your specific logic
        // Example: Check if the value is unique within a user

        return DB::table($this->parameters[0])
            ->where($this->parameters[1], $value)
            ->where('user_id', $userId)
            ->whereNotIn('id', (array) $ignoreId)
            ->doesntExist();
    }

    public function message()
    {
        return 'The dish name is not unique for that restaurant.';
    }
}
