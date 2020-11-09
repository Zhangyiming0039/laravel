import React,{Component} from 'react';
import { Menu,Layout} from 'antd';
import 'antd/dist/antd.css'; 
import {Link} from 'react-router-dom';
import { UserOutlined} from '@ant-design/icons';
import {Routes} from './Routes'
const { Header,Sider,Content} = Layout;
// const { SubMenu } = Menu;

class HHeader extends Component{
  
    render(){
        return(
          <Layout>
           
            <Header>
            <p style={{position:'absolute',left:'5%',color:'white',fontSize:'20px',letterSpacing:'5px',fontFamily:'宋体'}}>四年一贯制报名系统</p>
            <div className="logo" />
            <Menu theme="dark" mode="horizontal" defaultSelectedKeys={['2']}>
{/*       
              <Menu.Item key="3"><Link to='/'>
                          首页
                      </Link></Menu.Item>
              <Menu.Item key="1"><Link to='/stu_info'>报名信息</Link></Menu.Item>
              <Menu.Item key="5"><Link to='/user_info'>用户信息</Link></Menu.Item>
              <Menu.Item key="2"><Link to='/tch_info'>老师信息</Link></Menu.Item>
              <Menu.Item key="6"><Link to='/enroll'>报名</Link></Menu.Item> */}
              <Menu.Item style={{float:'right'}} key="7"><Link to='/login'>登陆</Link></Menu.Item>
              <Menu.Item style={{float:'right'}} key="4"><Link to='/register'>注册</Link></Menu.Item>
            </Menu>
          </Header>
          <Layout>
          <Content style={{ padding: '20 30px' ,height:'100%'} }>
              <Sider  width={200} >
                <Menu
                  mode="inline"
                  defaultSelectedKeys={['1']}
                  defaultOpenKeys={['sub1']}
                >
                  {Routes.map(route => {
              return (
                <Menu.Item key={route.path} icon={<UserOutlined />} >
                  <Link to={route.path}>{route.title}</Link>
                </Menu.Item>)
            })}
                </Menu>
              </Sider>
              
           
          
         
          </Content>
        

      </Layout>
          </Layout>
          )
    }
}
export default HHeader;