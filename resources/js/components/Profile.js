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
        const iconStyle = {
            maxWidth: '100%',
            height: 'auto',
        };
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Profile Component</div>
                            <div className="card-body">
                                <div>
                                    {this.state.iconUrl ?
                                        (<img src={this.state.iconUrl}
                                              alt="Icon"
                                              style={iconStyle}/>) : ('')}
                                </div>
                                <div>{this.state.name}</div>
                                <div>{this.state.introductions}</div>
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
