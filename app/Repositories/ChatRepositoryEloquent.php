<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ChatRepository;
use App\Models\Chat;
use App\Validators\ChatValidator;

/**
 * Class ChatRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ChatRepositoryEloquent extends BaseRepository implements ChatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Chat::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function store(array $input)
    {
        $input['active'] = $input['active'] ?? 1;

        $result = $this->model->create($input);

        return $result;
    }
    public function getAll($send_id)
    {
        // $result = $this->join('customers', function($join){
        //     $join->on('chats.receiver_id', 'customers.id');
        // })
        // ->where(function($query) use ($send_id){
        //     $query->where([['chats.send_id',$send_id],['active',1]])
        //     ->orWhere([['chats.receiver_id',$send_id],['active',1]]);
        // })
        // ->distinct()
        // ->select('chats.*','customers.name')
        // ->orderBy('chats.created_at','desc')
        // ->get();
        // $result =  $this->model->where(function($query) use ($send_id){
        //     $query->where([['chats.send_id',$send_id],['active',1]])
        //     ->orWhere([['chats.receiver_id',$send_id],['active',1]]);
        // })
        // ->latest()
        // ->with('sendCustomer')
        // ->with('receiverCustomer')
        // ->get();

        // Send List
        $result1 = $this->model->join('customers', function($join){
            $join->on('chats.receiver_id', 'customers.id');
        })
        ->where([['chats.send_id',$send_id],['active',1]])
        ->distinct()
        ->select('chats.*','customers.name','customers.ava')
        ->orderBy('chats.created_at','desc')
        ->get();
        $result1 = $result1->toArray();
        // return $result1;

        //Receiver List
        $result2 = $this->model->join('customers', function($join){
            $join->on('chats.send_id', 'customers.id');
        })
        ->where([['chats.receiver_id',$send_id],['active',1]])
        ->distinct()
        ->select('chats.*','customers.name','customers.ava')
        ->orderBy('chats.created_at','desc')
        ->get();
        $result2 = $result2->toArray();

        $result = collect(array_merge($result2,$result1))->sortBy('created_at')->groupBy('name');

        return $result;
    }
    public function getConversation(array $input)
    {
        $result = $this->model->where(function($query) use ($input) {
            $query->where([
                ['send_id',$input['send_id']],
                ['receiver_id',$input['receiver_id']],
                ['active',1]
            ])
            ->orWhere([
                ['send_id',$input['receiver_id']],
                ['receiver_id',$input['send_id']],
                ['active',1]
            ]);
        })->orderBy('created_at','asc')->get();
        return $result;
    }
    
}
