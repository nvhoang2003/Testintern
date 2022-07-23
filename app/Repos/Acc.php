<?php

namespace App\Repos;

use Illuminate\Support\Facades\DB;

class Acc
{
    public static function insert($acc){
        $sql = 'insert into account ';
        $sql .= '(email, password, name, address, phonenumber) ';
        $sql .= 'values (?, ?, ?, ?, ?) ';

        $result =  DB::insert($sql, [$acc->email, $acc->password, $acc->name, $acc->address, $acc->phonenumber]);
        if($result){
            return DB::getPdo()->lastInsertId();
        } else {
            return -1;
        }
    }

    public static function getAccbyEmail($email){
        $sql = 'select a.* ';
        $sql .= 'from account as a ';
        $sql .= 'where a.email = ? ';

        return DB::select($sql, [$email]);
    }

    public static function getAllAcc() {
        $sql = 'select a.* ';
        $sql .= 'from account as a ';


        return DB::select ($sql);
    }

    public static function update($acc){
        $sql = 'update account ';
        $sql .= 'set password = ? ';
        $sql .= 'where id = ? ';

        DB::update($sql, [$acc->newpass, $acc->id]);
    }
}
