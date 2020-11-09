import React, { Component } from 'react';
import { BrowserRouter, Route } from 'react-router-dom';
import HHeader from './header';
import Login from './pages/login';
import register from './pages/register';
import enroll from './pages/enroll';
import tch_info from './pages/tch_info';
import user_info from './pages/user_info';
import stu_info from './pages/stu_info';
import stu_patch from './pages/stu_patch';
import stu_view from './pages/stu_info/stu_view';
class App extends Component {
  render() {
    return (
      
        
        <BrowserRouter>
          {/* <body style={{overflowY:'hidden'}}> */}
          <HHeader />
      		<div style={{position:'absolute',left: '14.5%',
    top:'8.5%' ,width:'1155px',background:'#eeeeee',height:'100%',}}>
            <Route path='/user_info' exact component={user_info}></Route>
            <Route path='/tch_info' exact component={tch_info}></Route>
            <Route path='/stu_info' exact component={stu_info}></Route>
            <Route path='/login' exact component={Login}></Route>
            <Route path='/register' exact component={register}></Route>
            <Route path='/enroll' exact component={enroll}></Route>
            <Route path='/stu_patch' exact component={stu_patch}></Route>
            <Route path='/stu_view' exact component={stu_view}></Route>
            
           
            </div>
          {/* </body> */}
        
      	</BrowserRouter>
    
      	
     
    );
  }
}
export default App;
