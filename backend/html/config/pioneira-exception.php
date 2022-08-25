<?php

return [
    /* Configurações: 
       Debug: True para quando está em desenvolvimento, False para quando estiver em produção
       Type: 'web' ou 'api' 
    */
    'config' => [
        'debug' => false,
        'type' => 'api'
    ],

    /* Usado para o tratamento das exceções */
    "exceptions" => [
        "Symfony\Component\HttpKernel\Exception\NotFoundHttpException" => "\Pioneira\Security\Laravel\Http\Exceptions\NotFoundException",
        "ErrorException" => "\Pioneira\Security\Laravel\Http\Exceptions\ServerInternalException",
        "Illuminate\Database\QueryException" => "\Pioneira\Security\Laravel\Http\Exceptions\ServerInternalException",
        "Illuminate\Auth\AuthenticationException" => "\Pioneira\Security\Laravel\Http\Exceptions\AccessDeniedException",
        "Symfony\Component\HttpKernel\Exception\HttpException" => "\Pioneira\Security\Laravel\Http\Exceptions\AccessDeniedException",
        "Illuminate\Validation\ValidationException" => "\Pioneira\Security\Laravel\Http\Exceptions\ValidationException",
        "Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException"=>"\Pioneira\Security\Laravel\Http\Exceptions\NotFoundException",
    ],

    /* Usado para setar o tipo de erro para o log */
    'levels' => [
        Illuminate\Auth\Access\AuthorizationException::class                           => 'warning',
        Illuminate\Database\Eloquent\ModelNotFoundException::class                     => 'warning',
        Illuminate\Session\TokenMismatchException::class                               => 'notice',
        Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface::class    => 'notice',
        Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class            => 'notice',
        Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException::class => 'error',
        Symfony\Component\HttpKernel\Exception\HttpExceptionInterface::class           => 'warning',
        Exception::class                                                               => 'error',
        Throwable::class                                                               => 'critical',
    ],
];
