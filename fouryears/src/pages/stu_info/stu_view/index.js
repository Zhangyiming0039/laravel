import React, {Component } from 'react';
import { ApplyWrapper,ApplyBox } from './style';
import { Form, Input} from 'antd';
import axios from 'axios';

const { TextArea } = Input;

const layout = {
    labelCol: {
      span: 8,
    },
    wrapperCol: {
      span: 16,
    },
  };
// const [form]=useForm();
class stu_patch extends Component{
 
    // function stu_patch(){
    constructor() {
        super();
        this.state = {
          value: '',
          list:[],
        };
      }
 
      formRef = React.createRef()
 
      componentDidMount(){
    axios.get('/personal_info/id='+this.props.location.state.id).then(res=>{
      const data=res.data;
      // this.setState({list:result});
      this.formRef.current.setFieldsValue({
        student_id:data.student_id,
        name:data.name,
        phone:data.phone,
        email:data.email,
        favorite_teacher:data.favorite_teacher,
        personal_desc:data.personal_desc
         
  })
      // console.log(this.state.list.student_id);
    }).catch(function (error){
      console.log(error)
    } );
  };
  
  //这个是单选框的onchange函数
 
    render(){
    
      // const { value } = this.state;
      const value=this.state.presonal_desc;
      // const data=this.state.list;
        return(
            <ApplyWrapper>
                <ApplyBox>
                <Form {...layout} ref={this.formRef}  name="nest-messages"  >
                    <Form.Item
                            name={[ 'student_id']}
                            label="学号"
                           
                        >
                            <Input style={{width:'250px'}}readOnly="true"/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'name']}
                            label="姓名"
                            
                        >
                            <Input style={{width:'250px'}} readOnly="true"/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'phone']}
                            label="手机"
                           
                        >
                            <Input style={{width:'250px'}} readOnly="true"/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'email']}
                            label="邮箱"
                           
                        >
                            <Input style={{width:'250px'}} readOnly="true"/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'favorite_teacher']}
                            label="选择的老师"
                        
                        >
                            <Input style={{width:'250px'}} readOnly="true"/>
                            
                        </Form.Item>
                        <Form.Item
                            name={[ 'personal_desc']}
                            label="个人情况说明"
                            
                        >
                          <TextArea
                            style={{width:'250px'}}
                            autoSize={{ minRows: 2, maxRows: 6 }}
                           
                            value={value}
                            // onChange={this.onChange}
                          />
                        
                        </Form.Item>
                        
                        </Form>
            </ApplyBox>
        </ApplyWrapper>
        )
    }
}

export default stu_patch;