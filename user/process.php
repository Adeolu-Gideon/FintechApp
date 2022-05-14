<?php	
    function check_account(){
		extract($_POST);
		$chk = $this->conn->query("SELECT * FROM `users` where acctNo = '{$acctNo}' ".($id > 0 ? " and id != '{$id}' " : ''));
		$this->capture_err();
		if($chk->num_rows > 0){
			$resp['status'] = 'taken';
		}else{
			$resp['status'] = 'available';
		}
		return json_encode($resp);
	}
	function get_account(){
		extract($_POST);
		$qry = $this->conn->query("SELECT id,defBal,concat(lName,', ',fName) as name FROM `users` where acctNo = '{$acctNo}' ");
		$this->capture_err();
		if($qry->num_rows > 0){
			$resp['status'] = 'success';
			$resp['data'] = $qry->fetch_assoc();
		}else{
			$resp['status'] = 'not_exist';
		}
		return json_encode($resp);
	}
	function deposit(){
		extract($_POST);
		$current = floatval(str_replace(',','',$current));
		$new_balance = floatval($current) + floatval($defBal);
		$update = $this->conn->query("UPDATE `users` set `defBal` = '{$new_balance}' where id = {$account_id} ");
		$this->capture_err();
		if($update){
			$this->conn->query("INSERT INTO `transactions` set account_id ={$account_id},remarks='Deposits',`type` = 1, `amount` = '{$balance}' ");
			$this->capture_err();
			$resp['status']='success';
			if($this->settings->userdata('login_type') == 1){
				$this->settings->set_flashdata('success', $name.'\'s deposit successfully.');
			}else{
				$this->settings->set_flashdata('success', 'Deposit successfully saved.');
				$this->settings->set_userdata('balance', $new_balance);
			}
		}else{
			$resp['status'] = 'failed';
		}
		return json_encode($resp);
	}
	function withdraw(){
		extract($_POST);
		$current = floatval(str_replace(',','',$current));
		$new_balance = floatval($current) - floatval($balance);
		$update = $this->conn->query("UPDATE `users` set `defBal` = '{$new_balance}' where id = {$account_id} ");
		$this->capture_err();
		if($update){
			$this->conn->query("INSERT INTO `transactions` set account_id ={$account_id},remarks='Withdraw',`type` = 1, `amount` = '{$balance}' ");
			$this->capture_err();
			$resp['status']='success';
			if($this->settings->userdata('login_type') == 1){
			$this->settings->set_flashdata('success', $name.'\'s withdraw form successfully saved.');
			}else{
			$this->settings->set_flashdata('success', 'Withdraw form successfully saved.');
			$this->settings->set_userdata('defBal', $new_balance);
			}
		}else{
			$resp['status'] = 'failed';
		}
		return json_encode($resp);
	}
	
	function transfer(){
		extract($_POST);
		$current = floatval(str_replace(',','',$current));
		$new_balance = floatval($current) - floatval($balance);
		$update = $this->conn->query("UPDATE `users` set `defBal` = '{$new_balance}' where id = {$account_id} ");
		$this->capture_err();
		$update2 = $this->conn->query("UPDATE `users` set `defBal` = `defBal`+'{$defBal}' where id = {$transfer_id} ");
		$this->capture_err();
		if($update && $update2){
			$this->conn->query("INSERT INTO `transactions` set account_id ={$account_id},remarks='Transferred to {$transfer_number}',`type` = 3, `amount` = '{$balance}' ");
			$this->capture_err();
			$this->conn->query("INSERT INTO `transactions` set account_id ={$transfer_id},remarks='Transferred from {$acctNo}',`type` = 3, `amount` = '{$balance}' ");
			$this->capture_err();
			$resp['status']='success';
			$this->settings->set_flashdata('success', 'Transfer successfully processed.');
			if($this->settings->userdata('login_type') == 1)
				$this->settings->set_userdata('defBal', $new_balance);
		}else{
			$resp['status'] = 'failed';
		}
		return json_encode($resp);
	}