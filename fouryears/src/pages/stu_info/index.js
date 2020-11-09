import React, { } from 'react';
import axios from 'axios';
import {Table,Layout,Breadcrumb,Space,Popconfirm} from 'antd';
import 'antd/dist/antd.css'; 
import {ApplicationWrapper} from './style';
import {NavLink as Link} from 'react-router-dom';
const {Content} = Layout;
// function onShowSizeChange(current, pageSize) {
//   console.log(current, pageSize);
// }
class stu_info extends React.Component {
  constructor(){
    super();
    this.state={
      list: [],
      
    }
  }
  
 
  UNSAFE_componentWillMount(){
    const api="/stu_info";
    axios.get(api).then((res)=>{
     const result=res.data;
      this.setState({
        list:result,
      length:result.length});
      // console.log(this.state.length)
    }).catch(function (error){
          console.log(error);
        });
        
  }
render() {
  // const defaultPageSize=1;
  // const pages=this.state.length/defaultPageSize;
  // console.log(this.state.length)

  const columns=[
    {
      title: 'id',
      dataIndex: 'id',
      key: 'id',
    },
    {
      title: '学号',
      dataIndex: 'student_id',
      key: 'student_id',
    },
    {
      title: '姓名',
      dataIndex: 'name',
      key: 'name',
    },
    {
      title: '手机号',
      dataIndex: 'phone',
      key: 'phone',
    },
    {
      title: '邮箱',
      dataIndex: 'email',
      key: 'email',
    },
   
    {
      title: '选择的老师',
      dataIndex: 'favorite_teacher',
      key: 'favorite_teacher',
    },
    {
      title: '个人说明',
      dataIndex: 'personal_desc',
      key: 'personal_desc',
    },
    {
      title: '提交时间',
      dataIndex: 'created_at',
      key: 'create_at'
    },
    {
      title: '最近的一次更新时间',
      dataIndex: 'updated_at',
      key: 'updated_at',
    },
    {
      title:'操作',
      render: (text, record) => (
        <Space size="middle">
          <Link to={{pathname:'/stu_view',state:{id:record.id} }}>查看</Link>
          <Link to={{pathname:'/stu_patch',state:{id:record.id}}}>修改</Link>
          <Popconfirm
                    title="确定删除吗？"
                    onConfirm={() => {
                      axios.post('/stu_delete/id='+record.id).then(
                        // console.log(this.state.list)
                      )
                      axios.get('/stu_info').then((res)=>{
                        const result=res.data;
                        this.setState({list:result});
                      })
                    }}
                    onCancel={()=>{
                    }}
                    okText="确定"
                    cancelText="取消"
                  >
                    <a href={"javascript"} style={{ color: "red" }}>
                    删除
                    </a>
                  </Popconfirm>
        </Space>
      ),
      key:'Operation'
    }
  ];
    return(
      
      <ApplicationWrapper>
        <Layout className="layout">
   <div style={{ background: '#eee',height:'706px' }}> 
     <Content style={{ padding: '0 50px' }}>
      <Breadcrumb style={{ margin: '16px 0' }}>
        <Breadcrumb.Item></Breadcrumb.Item>
      </Breadcrumb>
      <div className="site-layout-content"> <Table dataSource={this.state.list} columns={columns} pagination={{
        defaultCurrent:1,
        defaultPageSize:2,
      }}/></div>
         
    </Content>
    </div>
   
  </Layout>
           
      </ApplicationWrapper>
    )
  }
}

export default stu_info;
