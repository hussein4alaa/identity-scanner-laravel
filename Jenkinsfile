pipeline {
  agent any
  stages {
    stage('Deploy') {
      parallel {
        stage('Deploy') {
          steps {
            echo 'Deployment'
          }
        }

        stage('Test') {
          steps {
            echo 'Testing'
          }
        }

      }
    }

    stage('npm') {
      steps {
        sh 'npm install'
        echo 'npm installing'
      }
    }

    stage('build') {
      steps {
        sh 'npm run build'
        echo 'building'
      }
    }

  }
}