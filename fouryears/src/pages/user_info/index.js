import React, { Component } from 'react';
import axios from 'axios';
import {Table,Layout,Breadcrumb} from 'antd';
import 'antd/dist/antd.css'; 
import {ApplicationWrapper} from './style';
const {Content} = Layout;
const columns=[
  {
    title: 'id',
    dataIndex: 'id',
    key: 'id',
  },
  {
    title: '用户名',
    dataIndex: 'username',
    key: 'username',
  },
  {
    title: '手机号',
    dataIndex: 'phone',
    key: 'phone',
  },
  {
    title: '注册时间',
    dataIndex: 'created_at',
    key: 'create_at'
  },
 
];
class user_info extends Component {
  constructor(props) {
    super(props)
    this.state={
      list: []
    }
  }
  UNSAFE_componentWillMount(){
    //获取用户信息
    const api="/view";
    axios.get(api).then((res)=>{
      const result=res.data;
      this.setState({list:result});
    }).catch(function (error){
          console.log(error);
        });
  }
render() {
    return(
      <ApplicationWrapper>
        <Layout className="layout">
   <div style={{ background: '#eee',height:'706px' }}> 
     <Content style={{ padding: '0 50px' }}>
      <Breadcrumb style={{ margin: '16px 0' }}>
        <Breadcrumb.Item></Breadcrumb.Item>
      </Breadcrumb>
      <div className="site-layout-content" > 
       <Table dataSource={this.state.list} columns={columns} />
      </div>
    </Content>
    </div>
  </Layout>
      </ApplicationWrapper>
    )
  }
}

export default user_info;
