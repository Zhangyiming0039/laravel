import React,{Component} from 'react';
import {RegisterWrapper,RegisterBox} from './style';
import { Form, Input, Button, message } from 'antd';
import axios from 'axios';
const layout = {
    labelCol: {
      span: 8,
    },
    wrapperCol: {
      span: 16,
    },
  };
//   const onFnish = values => {
//         axios.post('/register', 
//                 {
//                     username:values.username,

//                 }
//           )
//           .then(function (response) {
//             console.log(response);
//           })
//           .catch(function (error) {
//             console.log(error);
//           });
// }
class Register extends Component{
    NamehandleChange(e){
        this.setState({username:e.target.value});
    }
    PhonehandleChange(e){
        this.setState({phone:e.target.value});
    }
    PasswdhandleChange(e){
        this.setState({password:e.target.value});
    }
    AgainhandleChange(e){
        this.setState({retrypassword:e.target.value});
    }
    ConfirmChange(){
        // // console.log(this.state.password);
        // // console.log(this.state.retrypassword);
        // if(this.state.password!==this.state.retrypassword){
        //     this.setState({retrypassword:''});
        //     this.setState({password:''});
        //     // this.rules={  
        //     //     massage:'两次密码不一致'
        //     // }
        //     console.log(this.state.password);
        // }
    }
    constructor(props) {
        super(props);
        this.state = {
            
        }; 
    }
    
    handleClick(){
        axios.post('/register',
        {
            // params:{post传参数不需要params
                username:this.state.username,
                password:this.state.password,
                phone:this.state.phone
            // }
        }
        ).then(res=> {
       if(!res.data){
        message.error('用户名已存在');
       }
       else{
           this.props.history.push({
               pathname:'/login'
           })
           message.success('请登录')
       }
          })
          .catch(function (error) {
            console.log(error);
          });
    
}
    render(){
        // var stu_id=this.state.student_id;
        // var name=this.state.name;
        return(                
            <RegisterWrapper>
                {/* <h>{stu_id}</h><br />
                <h>{name}</h> */}
                <RegisterBox>
                    <Form {...layout}  name="nest-messages"  >
                        <Form.Item
                            name={[ 'username']}
                            label="用户名"
                            onChange={this.NamehandleChange.bind(this)}
                            rules={[{ required: true, message: '用户名不能为空' }]}
                        >
                            <Input style={{width:'250px'}}/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'password']}
                            label="密码"
                            onChange={this.PasswdhandleChange.bind(this)}
                            rules={[{ required: true, message: '密码不能为空' }]}
                        >
                            <Input style={{width:'250px'}}/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'retrypassword']}
                            label="确认密码"
                            onChange={this.AgainhandleChange.bind(this)}
                            onBlur={this.ConfirmChange.bind(this)}
                            rules={[{ required: true,message:'确认密码不能为空' }]}
                        >
                            <Input style={{width:'250px'}}/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'phone']}
                            label="手机号"
                            onChange={this.PhonehandleChange.bind(this)}
                            rules={[
                              {
                                required:true,
                                message:'手机号不能为空',
                              },
                            ]}
                        >
                        <Input style={{width:'250px'}}/>
                        </Form.Item>
                        <Form.Item wrapperCol={{ ...layout.wrapperCol, offset: 8 }}>
                            <Button onClick={this.handleClick.bind(this)} type="primary" htmlType="submit">
                            提交
                            </Button>
                        </Form.Item>
                        </Form>
                </RegisterBox>
            </RegisterWrapper>
        )
    }
}
export default Register;