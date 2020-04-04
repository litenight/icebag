<?php

use Illuminate\Http\Request;

if (! function_exists('user')) {
    /**
     * Get the authenticated user and/or attributes.
     */
    function user($attribute = null)
    {
        if (! is_null($attribute)) {
            return auth()->user()->{$attribute};
        }

        return auth()->user();
    }
}

if (! function_exists('company')) {
    /**
     * Get the authenticated company account and/or attributes.
     */
    function company($attribute = null)
    {
        if (! user()->isType(['company'])) {
            return null;
        }

        if (! is_null($attribute)) {
            return user('profile')->{$attribute};
        }

        return user('profile');
    }
}

if (! function_exists('make_name')) {
    /**
     * Generate fullname of user using first nad last names.
     *
     * @param  string $firstName
     * @param  string $lastName
     * @return string
     */
    function make_name($firstName, $lastName)
    {
        return $firstName . ' ' . $lastName;
    }
}

if (! function_exists('is_active')) {
    /**
     * Determine if the given route is active path.
     */
    function is_active($path, $active = 'active', $default = '')
    {
        return call_user_func_array('Request::is', (array) $path) ? $active : $default;
    }
}

if (! function_exists('parse')) {
    /**
     * Parse markdown.
     *
     * @param string $content
     *
     * @return \Parsedown
     */
    function parse($content)
    {
        return app('markdown')->text($content);
    }
}

if (! function_exists('make_username')) {
    /**
     * Generate unique username from first name.
     *
     * @param  string $name
     * @return string
     */
    function make_username($name)
    {
        [$firstName, $lastName] = explode(" ", $name);

        return ucfirst($firstName);
    }
}

if (! function_exists('make_password')) {
    /**
     * Generate a random secure password.
     *
     * @return string
     */
    function make_password()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = [];

        for ($i = 0; $i < 12; $i++) {
            $n = rand(0, (strlen($alphabet) - 1));
            $pass[] = $alphabet[$n];
        }

        return implode($pass); //turn the array into a string
    }
}

if (! function_exists('inputs')) {
    /**
     * Get only fillable attributes from request input.
     *
     * @param  array  $attributes
     * @return array
     */
    function inputs(Request $request, array $attributes = [])
    {
        return $request->only($attributes);
    }
}

if (! function_exists('get_querytext')) {
    /**
     * Get request query string and capitalize text.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string
     */
    function get_querytext(Request $request)
    {
        if (! empty($request->getQueryString())) {
            return preg_replace(
                "/[^a-zA-Z]+/",
                "",
                ucfirst($request->getQueryString())
            );
        }

        return null;
    }
}

if (! function_exists('get_excerpt')) {
    /**
     * Trim large text body to size of an excerpt.
     *
     * @param string $content
     * @param int    $length
     *
     * @return string
     */
    function get_excerpt($content, $length = 255)
    {
        $content = preg_split('/<!-- more -->/m', $content, 2);
        $cleaned = trim(
            strip_tags(
                preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content[0]),
                '<code>'
            )
        );

        if (count($content) > 1) {
            return $content[0];
        }

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    }
}

if (! function_exists('make_model')) {
    /**
     * Convert string to model class.
     *
     * @param  string $name
     * @return \Illuminate\Database\Eloquent\Model
     */
    function make_model($name)
    {
        return 'App\\' . ucfirst($name);
    }
}

if (! function_exists('success')) {
    /**
     * Redirect to given path with success message.
     *
     * @param  string $path
     * @param  string $action
     * @return \Illuminate\Routing\RedirectResponse
     */
    function success($path, $message = null)
    {
        return redirect($path)->with([
            'level' => 'success',
            'message' => $message
        ]);
    }
}
