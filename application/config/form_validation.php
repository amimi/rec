<?php
$config = [
	'error_prefix' => '<span class="help-block">',
	'error_suffix' => '</span>',
	
	// ログイン
	'admin/login/index' => [
		['field' => 'login_id', 'label' => 'login id', 'rules' => 'required|max_length[20]'],
		['field' => 'password', 'label' => 'password', 'rules' => 'required|max_length[100]']
	],
	
	// 投稿作成
	'admin/record/create' => [
// 		['field' => 'image', 'label' => 'image', 'rules' => 'required|max_length[100]'],
		['field' => 'comment', 'label' => 'comment', 'rules' => 'max_length[200]'],
		['field' => 'published_flag', 'label' => 'published flag', 'rules' => 'integer'],
		['field' => 'published_at', 'label' => 'published at', 'rules' => ''],
		['field' => 'categories[]', 'label' => 'categories', 'rules' => ''],
		['field' => 'tags[]', 'label' => 'tags', 'rules' => '']
	],
	
	// category作成
	'admin/category/index' => [
		['field' => 'category_name', 'label' => 'name', 'rules' => 'required|max_length[100]|is_unique[category.category_name]'],
		['field' => 'segment', 'label' => 'segment', 'rules' => 'max_length[20]|is_unique[category.segment]']
	],
	
	// tag作成
	'admin/tag/index' => [
		['field' => 'tag_name', 'label' => 'name', 'rules' => 'required|max_length[100]|is_unique[tag.tag_name]'],
		['field' => 'segment', 'label' => 'segment', 'rules' => 'max_length[20]|is_unique[tag.segment]']
	],
	
	// ユーザー作成
	'admin/user/create' => [
		['field' => 'login_id', 'label' => 'login id', 'rules' => 'required|max_length[20]|is_unique[admin_user.login_id]'],
		['field' => 'password', 'label' => 'password', 'rules' => 'required|max_length[100]'],
		['field' => 'admin_name', 'label' => 'name', 'rules' => 'required|max_length[20]|is_unique[admin_user.admin_name]'],
		['field' => 'image', 'label' => 'image', 'rules' => 'max_length[100]']
	]

];