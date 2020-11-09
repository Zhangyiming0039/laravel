import React, { PureComponent } from 'react';
import { Redirect } from 'react-router-dom';
import { LoginWrapper, LoginBox } from './style';
import { Button ,Input,Space} from 'antd';
import { UserOutlined,UnlockOutlined} from '@ant-design/icons';
import 'antd/dist/antd.css';
import axios from 'axios';
class Login extends PureComponent {
	Username(e){
		this.setState={
			username:e.target.value
		}
	}
	Userpasswd(e){
		this.setState={
			password:e.target.value
		}
	}
	constructor(props) {
        super(props);
        this.state = {}; 
	}
	handleClick(){
        const val=JSON.stringify(this.state);
        console.log(val);
        //用户登录
        axios.post("/log",val)
        .then(res=>{
                 console.log('res=>',res)
        })
    }
	render() {
		const { loginStatus } = this.props;
		if (!loginStatus) {
			return(
				<LoginWrapper>
					<LoginBox>
						<Input
						style={{width:'300px',marginLeft:'50px'}}
						size="default" 
						placeholder="用户名" 
						onChange={this.Username.bind(this)}
						prefix={<UserOutlined />} />
						<Space 
						style={{width:'300px',marginLeft:'50px',marginTop:'20px'}}
						direction="vertical">
						   <Input.Password 
						   onChange={this.Userpasswd.bind(this)}
						   placeholder="密码" 
						   prefix={<UnlockOutlined />}/>
                        </Space>
						<Button 
						type="primary" 
						onClick={this.handleClick.bind(this)}
						style={{marginLeft:'160px',marginTop:'40px'}}>登陆</Button>
					</LoginBox>
				</LoginWrapper>
			)
		}else {
			return <Redirect to='/'/>
		}
	}
}

// const mapState = (state) => ({
// 	loginStatus: state.getIn(['login', 'login'])
// })

// const mapDispatch = (dispatch) => ({
// 	login(accountElem, passwordElem){
// 		dispatch(actionCreators.login(accountElem.value, passwordElem.value))
// 	}
// })

export default Login;