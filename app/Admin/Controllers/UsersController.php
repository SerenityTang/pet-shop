<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UsersController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('用户列表')
            ->description('平台用户')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->id('Id');
        $grid->username('用户名');
        $grid->email('邮箱地址');
        $grid->mobile('电话号码');
        //$grid->password('Password');
        //$grid->remember_token('Remember token');
        $grid->nick_name('昵称');
        $grid->avatar('头像');
        $grid->realname('真实姓名');
        $grid->gender('性别');
        $grid->birth('出生日期');
        $grid->province('省');
        $grid->city('市');
        $grid->district('区');
        $grid->address('详细地址');
        $grid->personal_domain('个性域名');
        $grid->personal_website('个人网站');
        $grid->personal_intro('个人简介');
        $grid->qq_name('QQ名');
        $grid->qq('QQ');
        $grid->wechat_name('微信名');
        $grid->wechat('微信号');
        //$grid->wechat_qrcode('Wechat qrcode');
        //$grid->wechat_openid('Wechat openid');
        //$grid->wechat_unionid('Wechat unionid');
        $grid->weibo_name('微博名');
        $grid->weibo_link('微博链接');
        $grid->github_name('github名');
        $grid->github_link('github链接');
        //$grid->profession_status('Profession status');
        $grid->profession('职业');
        //$grid->applied_notifications('Applied notifications');
        //$grid->commented_notifications('Commented notifications');
        //$grid->attentioned_notifications('Attentioned notifications');
        //$grid->email_notifications('Email notifications');
        $grid->user_status('用户状态')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->user_identity('用户身份')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->approval_time('实名认证时间')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->approval_status('实名认证状态')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->email_verified('邮箱认证状态')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->mobile_verified('手机认证状态')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->expert_status('达人认证状态')->display(function ($value) {
            return $value ? '是' : '否';
        });
        //$grid->created_at('Created at');
        //$grid->updated_at('Updated at');
        //$grid->deleted_at('Deleted at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->id('Id');
        $show->username('Username');
        $show->email('Email');
        $show->mobile('Mobile');
        $show->password('Password');
        $show->remember_token('Remember token');
        $show->nick_name('Nick name');
        $show->avatar('Avatar');
        $show->realname('Realname');
        $show->gender('Gender');
        $show->birth('Birth');
        $show->province('Province');
        $show->city('City');
        $show->district('District');
        $show->address('Address');
        $show->personal_domain('Personal domain');
        $show->personal_website('Personal website');
        $show->personal_intro('Personal intro');
        $show->qq_name('Qq name');
        $show->qq('Qq');
        $show->wechat_name('Wechat name');
        $show->wechat('Wechat');
        $show->wechat_qrcode('Wechat qrcode');
        $show->wechat_openid('Wechat openid');
        $show->wechat_unionid('Wechat unionid');
        $show->weibo_name('Weibo name');
        $show->weibo_link('Weibo link');
        $show->github_name('Github name');
        $show->github_link('Github link');
        $show->profession_status('Profession status');
        $show->profession('Profession');
        $show->applied_notifications('Applied notifications');
        $show->commented_notifications('Commented notifications');
        $show->attentioned_notifications('Attentioned notifications');
        $show->email_notifications('Email notifications');
        $show->user_status('User status');
        $show->user_identity('User identity');
        $show->approval_time('Approval time');
        $show->approval_status('Approval status');
        $show->email_verified('Email verified');
        $show->mobile_verified('Mobile verified');
        $show->expert_status('Expert status');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        $show->deleted_at('Deleted at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);

        $form->text('username', 'Username');
        $form->email('email', 'Email');
        $form->mobile('mobile', 'Mobile');
        $form->password('password', 'Password');
        $form->text('remember_token', 'Remember token');
        $form->text('nick_name', 'Nick name');
        $form->image('avatar', 'Avatar');
        $form->text('realname', 'Realname');
        $form->switch('gender', 'Gender');
        $form->date('birth', 'Birth')->default(date('Y-m-d'));
        $form->text('province', 'Province');
        $form->text('city', 'City');
        $form->text('district', 'District');
        $form->text('address', 'Address');
        $form->text('personal_domain', 'Personal domain');
        $form->text('personal_website', 'Personal website');
        $form->textarea('personal_intro', 'Personal intro');
        $form->text('qq_name', 'Qq name');
        $form->text('qq', 'Qq');
        $form->text('wechat_name', 'Wechat name');
        $form->text('wechat', 'Wechat');
        $form->text('wechat_qrcode', 'Wechat qrcode');
        $form->text('wechat_openid', 'Wechat openid');
        $form->text('wechat_unionid', 'Wechat unionid');
        $form->text('weibo_name', 'Weibo name');
        $form->text('weibo_link', 'Weibo link');
        $form->text('github_name', 'Github name');
        $form->text('github_link', 'Github link');
        $form->switch('profession_status', 'Profession status');
        $form->text('profession', 'Profession');
        $form->switch('applied_notifications', 'Applied notifications')->default(1);
        $form->switch('commented_notifications', 'Commented notifications')->default(1);
        $form->switch('attentioned_notifications', 'Attentioned notifications')->default(1);
        $form->switch('email_notifications', 'Email notifications')->default(1);
        $form->switch('user_status', 'User status');
        $form->switch('user_identity', 'User identity');
        $form->datetime('approval_time', 'Approval time')->default(date('Y-m-d H:i:s'));
        $form->switch('approval_status', 'Approval status');
        $form->switch('email_verified', 'Email verified');
        $form->switch('mobile_verified', 'Mobile verified');
        $form->switch('expert_status', 'Expert status');

        return $form;
    }
}
