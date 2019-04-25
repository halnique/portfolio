import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Profile extends Component {
    constructor(props) {
        super(props);
        this.state = {
            name: '',
            introductions: '',
        };
    }

    componentDidMount() {
        axios.get('/api/profiles/halnique').then((response) => {
            this.setState({
                name: response.data.name,
                introductions: response.data.introductions,
            });
        }).catch(error => {
            console.log(error);
        });
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Profile Component</div>
                            <div className="card-body">
                                <p>{this.state.name}</p>
                                <p>{this.state.introductions}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('profile')) {
    ReactDOM.render(<Profile/>, document.getElementById('profile'));
}
