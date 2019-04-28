import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Profile extends Component {
    constructor(props) {
        super(props);
        this.state = {
            name: '',
            introductions: '',
            iconUrl: '',
        };
    }

    componentDidMount() {
        axios.get('/api/profiles/halnique').then((response) => {
            this.setState({
                name: response.data.name,
                introductions: response.data.introductions,
                iconUrl: response.data.iconUrl,
            });
        }).catch(error => {
            console.log(error);
        });
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-10">
                        <div className="card">
                            <div className="card-header">Profile</div>
                            {this.state.iconUrl ?
                                (<img src={this.state.iconUrl}
                                      alt="Icon"
                                      className="card-img-top"/>) : ('')}
                            <div className="card-body">
                                <div className="card-title">Name</div>
                                <p className="card-text">{this.state.name}</p>
                                <p className="card-text">{this.state.introductions}</p>
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
