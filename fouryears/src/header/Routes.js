import enroll from "../pages/enroll"
import stu_info from "../pages/stu_info"
import user_info from "../pages/user_info"
import tch_info from "../pages/tch_info"
export const Routes = [{
        path: '/enroll',
        component: enroll,
        title: '报名',
        icon: "EditOutlined"
    },
    {
        path: '/stu_info',
        component: stu_info,
        title: '学生信息',
        icon: "UserOutlined"
    },
    {
        path: '/user_info',
        component: user_info,
        title: '用户信息',
        icon: "UserOutlined"
    },
    {
        path: '/tch_info',
        component: tch_info,
        title: '老师信息',
        icon: "UserOutlined"
    },

]