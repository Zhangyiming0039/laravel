import React, {Component } from 'react';
import { ApplyWrapper,ApplyBox } from './style';
import { Form, Input, Button } from 'antd';
import axios from 'axios';
import { Cascader } from 'antd';
import {NavLink as Link} from 'react-router-dom';
const { TextArea } = Input;
const layout = {
    labelCol: {
      span: 8,
    },
    wrapperCol: {
      span: 16,
    },
  };
  
const options = [
  {
    value: '导师A',
    label: '导师A',
  },
  {
    value: '导师B',
    label: '导师B',
  },
];

class Enroll extends Component{
  state = {
    value: '',
  };
  //这个是单选框的onchange函数
  onChange(value) {
    // console.log(value);
    this.setState({favorite_teacher:value[0]})
  }
  qqq=({ target: { value } }) => {
    this.setState({ value });
    console.log(this.state.value)
  };
    stuIdhandleChange(e) {
        this.setState({student_id: e.target.value});
      }
    NamehandleChange(e){
        this.setState({name:e.target.value});
    }
    PhonehandleChange(e){
        this.setState({phone:e.target.value});
    }
    EmailhandleChange(e){
        this.setState({email:e.target.value});
    }
    TeacherhandleChange(e){
        this.setState({favorite_teacher:e.target.value});
    }

    constructor(props) {
        super(props);
        this.state = {}; 
    }
    handleClick(){
        const val=JSON.stringify(this.state);
        console.log(val);
        
        //学生报名
        axios.post("/enroll",{
          student_id:this.state.student_id,
          name:this.state.name,
          email:this.state.email,
          phone:this.state.phone,
          favorite_teacher:this.state.favorite_teacher,
          presonal_desc:this.state.personal_desc
        }
          

        )
        .then(res=>{
                 console.log('res=>',res)
        })
    }
    render(){
    
      // const { value } = this.state;
      const value=this.state.presonal_desc;
        return(
            <ApplyWrapper>
                <ApplyBox>
                <Form {...layout}  name="nest-messages"  >
                    <Form.Item
                            name={[ 'student_id']}
                            label="学号"
                            onChange={this.stuIdhandleChange.bind(this)}
                            rules={[{ required: true, message: '学号不能为空' }]}
                        >
                            <Input style={{width:'250px'}} />
                        </Form.Item>
                        <Form.Item
                            name={[ 'name']}
                            label="姓名"
                            onChange={this.NamehandleChange.bind(this)}
                            rules={[{ required: true, message: '姓名不能为空' }]}
                        >
                            <Input style={{width:'250px'}}/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'phone']}
                            label="手机"
                            onChange={this.PhonehandleChange.bind(this)}
                            rules={[
                              {
                                // type: 'phone',
                                required:true,
                                message:'手机号不能为空',
                              },
                            ]}
                        >
                            <Input style={{width:'250px'}}/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'email']}
                            label="邮箱"
                            onChange={this.EmailhandleChange.bind(this)}
                            // rules={[
                            //   {
                            //     type: 'email',
                            //     required:true,
                            //     message:'邮箱不能为空'
                            //   },
                            // ]}
                        >
                            <Input style={{width:'250px'}}/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'favorite_teacher']}
                            label="选择的老师"
                            rules={[
                              {
                                required:true,
                                message:'这一栏不能为空'
                              },
                            ]}
                        >
                           <Cascader 
                           options={options} 
                           onChange={this.onChange.bind(this)}
                          
                         
                            style={{width:'250px'}} />
                      
                        </Form.Item>
                        <Form.Item
                            name={[ 'personal_desc']}
                            label="个人情况说明"
                           
                            rules={[
                              {
                                required:true,
                                message:'不能为空'
                              },
                            ]}
                        >
                          <TextArea
                            style={{width:'250px'}}
                            autoSize={{ minRows: 2, maxRows: 6 }}
                            onChange={this.qqq.bind(this)}
                            value={value}
                            // onChange={this.onChange}
                          />
                        
                        </Form.Item>
                         <Form.Item wrapperCol={{ ...layout.wrapperCol, offset: 8 }}>
                            <Link to="/stu_info"><Button  onClick={this.handleClick.bind(this)}type="primary" htmlType="submit">
                            提交
                            </Button></Link>
                        </Form.Item>
                        </Form>
            </ApplyBox>
        </ApplyWrapper>
        )
    }
}

export default Enroll;