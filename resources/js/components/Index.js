import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Index extends Component {
    constructor(props) {
        super(props);
        this.state = {
            profiles: [],
        };
    }

    componentDidMount() {
        axios.get('/api/profiles').then((response) => {
            this.setState({
                profiles: response.data,
            });
        }).catch(error => {
            console.log(error);
        });
    }

    render() {
        const profiles = this.state.profiles.map(profile => {
            return (
                <div key={profile.id} className="card">
                    <div className="card-header">Profile</div>
                    <img src={profile.iconUrl}
                         alt="Icon"
                         className="card-img-top"/>
                    <div className="card-body">
                        <div className="card-title">Name: {profile.name}</div>
                        <p className="card-text">{profile.introductions}</p>
                    </div>
                </div>
            );
        });
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-10">
                        {profiles}
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('index')) {
    ReactDOM.render(<Index/>, document.getElementById('index'));
}
