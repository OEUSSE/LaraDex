<?php

namespace LaraDex\Exceptions;

use Exception;

class CustomException extends Exception
{
    /**
     * Report the exception.
     * 
     * @return void
     */    
    public function report()
    {
        //
    }

    /**
     * Render the exception into a HTTP response.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\Response
     */

    public function render($request)
    {
        return response()->view(
            'errors.custom',
            array(
                'exception' => $this
            )
        );
    }
}
