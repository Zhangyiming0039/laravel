import React, {Component } from 'react';
import { ApplyWrapper,ApplyBox } from './style';
import { Form, Input, Button} from 'antd';
import axios from 'axios';
import { Cascader } from 'antd';
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
// const [form]=useForm();
class stu_patch extends Component{
 
    // function stu_patch(){
    constructor() {
        super();
        this.state = {
          // value: '',
          list:{id:'1'},
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
        // favorite_teacher:data.favorite_teacher,
        personal_desc:data.personal_desc
  })
    }).catch(function (error){
      console.log(error)
    } );
  };
//   componentDidMount(){
//     console.log(this.props.location.state.list)
//     const data=this.props.location.state.list;
//     // this.setState({list:result});
//     this.formRef.current.setFieldsValue({
//       student_id:data.student_id,
//       name:data.name,
//       phone:data.phone,
//       email:data.email,
//       // favorite_teacher:data.favorite_teacher,
//       personal_desc:data.personal_desc
// })
//   };
  //这个是单选框的onchange函数
  onChange(value){
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

    handleClick(){
        const val=JSON.stringify(this.state);
        console.log(val);
        //学生报名
        axios.patch("/stu_patch",{
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
      // const data=this.state.list;
        return(
            <ApplyWrapper>
                <ApplyBox>
                <Form {...layout} ref={this.formRef}  name="nest-messages"  >
                    <Form.Item
                            name={[ 'student_id']}
                            label="学号"
                            onChange={this.stuIdhandleChange.bind(this)}
                            rules={[{ required: true, message: '学号不能为空' }]}
                        >
                            <Input style={{width:'250px'}} value=''/>
                        </Form.Item>
                        <Form.Item
                            name={[ 'name']}
                            label="姓名"
                            onChange={this.NamehandleChange.bind(this)}
                            rules={[{ required: true, message: '姓名不能为空' }]}
                        >
                            <Input style={{width:'250px'}} />
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
                            // name={[ 'favorite_teacher']}
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
                            // placeholder="Please select"
                            defaultValue={['导师A']}
                            style={{width:'250px'}} />
                            {/* <Input }/> */}
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
                            <Button  onClick={this.handleClick.bind(this)}type="primary" htmlType="submit">
                            保存
                            </Button>
                        </Form.Item>
                        </Form>
            </ApplyBox>
        </ApplyWrapper>
        )
    }
}

export default stu_patch;