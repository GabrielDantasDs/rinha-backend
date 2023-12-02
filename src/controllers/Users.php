<?php

namespace controllers;

use Exception;
use http\Response;
use models\Users as UsersModel;

class Users {
    public static function create($payload) {
        $user = new UsersModel();
        $response = null;

        try {
            if (!$user->createTable()) {
                $response = new Response('Erro ao criar tabela', 422);
                return $response->json();
            }

            if ($user->insert($payload)) {
                $response = new Response('Registro criado com sucesso', 200);
                return $response->json();
            }

        } catch (Exception $e) {
            $response = new Response(['Erro ao criar registro.'], 422);
            return $response->json();
        }
    }

    public static function update($id, $payload) {
        $user = new UsersModel();
        $response = null;

        try {
            if (!$user->createTable()) {
                $response = new Response('Erro ao criar tabela', 422);
                return $response->json();
            }

            if ($user->update($id, $payload)) {
                $response = new Response('Registro alterado com sucesso', 200);
                return $response->json();
            }

        } catch (Exception $e) {
            $response = new Response(['Erro ao alterar registro.'], 422);
            return $response->json();
        }
    }

    public static function get($id) {
        $user = new UsersModel();
        $response = null;

        try {
            if (!$user->createTable()) {
                $response = new Response('Erro ao criar tabela', 422);
                return $response->json();
            }

            $data = $user->get($id);
            if ($data) {
                $response = new Response($data, 200);
                return $response->json();
            }

        } catch (Exception $e) {
            $response = new Response(['Erro ao alterar registro.'], 422);
            return $response->json();
        }
    }

    public static function delete($id) {
        $user = new UsersModel();
        $response = null;

        try {
            if (!$user->createTable()) {
                $response = new Response('Erro ao criar tabela', 422);
                return $response->json();
            }

            
            if ($user->delete($id)) {
                $response = new Response('Registro deletado com sucesso.', 200);
                return $response->json();
            }

        } catch (Exception $e) {
            $response = new Response(['Erro ao alterar registro.'], 422);
            return $response->json();
        }
    }
}